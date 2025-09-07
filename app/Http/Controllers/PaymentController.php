<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Display pending payments for the authenticated user
     */
    public function pending()
    {
        $user = Auth::user();
        $membership = $user->membership;

        if (!$membership) {
            return redirect()->route('dashboard')->with('error', 'You need a membership to view pending payments.');
        }

        $result = $this->paymentService->getPendingPayments($membership);

        return view('back.pending-payments', [
            'pendingPayments' => $result['pending_payments'],
            'stats' => $result['stats'],
            'membership' => $membership
        ]);
    }

    /**
     * Initialize Paystack payment
     */
    public function initializePayment(Request $request, Payment $payment)
    {
        $user = Auth::user();
        $membership = $user->membership;

        log("Initializing payment for user ID: {$user->id}, Payment ID: {$payment->id}");

        if (!$membership) {
            return redirect()->back()->with('error', 'You need a membership to make payments.');
        }



        // 
        // Get the amount from payment instead
        $amount = $payment->amount;

        // Initialize payment
        $result = $this->paymentService->initializePayment($payment, $membership, $amount, $user->email);

        if (!$result['success']) {
            return redirect()->back()->with('error', $result['message']);
        }

        // Store transaction reference temporarily
        session([
            'paystack_transaction_ref' => $result['reference'],
            'paystack_payment_id' => $payment->id,
            'paystack_amount' => $amount
        ]);

        // Redirect to Paystack payment page
        return redirect($result['authorization_url']);
    }

    /**
     * Handle Paystack payment callback
     */
    public function handlePaymentCallback(Request $request)
    {
        $reference = $request->reference;

        if (!$reference) {
            // Try to get reference from session if not in URL
            $reference = session('paystack_transaction_ref');

            if (!$reference) {
                return redirect()->route('payment.history.index')->with('error', 'Invalid payment reference.');
            }
        }

        // Verify transaction
        $verification = $this->paymentService->verifyPayment($reference);

        if (!$verification['success']) {
            return redirect()->route('payment.pending')->with('error', $verification['message']);
        }

        // Check if transaction was successful
        if ($verification['data']['status'] !== 'success') {
            return redirect()->route('payment.pending')
                ->with('error', 'Payment failed or was not completed.');
        }

        // Verify the amount matches
        $expectedAmount = session('paystack_amount') * 100; // Convert to kobo
        $actualAmount = $verification['data']['amount'];

        if ($expectedAmount != $actualAmount) {
            Log::error("Payment amount mismatch: Expected {$expectedAmount}, Got {$actualAmount}");
            return redirect()->route('payment.pending')
                ->with('error', 'Payment verification failed. Amount mismatch.');
        }

        // Get stored session data
        $paymentId = session('paystack_payment_id');
        $amount = session('paystack_amount');

        // Get payment and membership details
        $payment = Payment::find($paymentId);
        $user = Auth::user();
        $membership = $user->membership;

        // Record payment
        $paymentRecord = $this->paymentService->recordPayment(
            $paymentId,
            $membership->id,
            $amount,
            $reference,
            'paystack',
            $verification['data']
        );

        if (!$paymentRecord) {
            return redirect()->route('payment.pending')
                ->with('error', 'Payment recorded but failed to save details. Please contact support.');
        }

        // Send confirmation email
        $this->paymentService->sendConfirmationEmail($payment, $membership, $amount, $user->email);

        // Clear session data
        $request->session()->forget(['paystack_transaction_ref', 'paystack_payment_id', 'paystack_amount']);

        return redirect()->route('payment.history.index')
            ->with('success', 'Payment processed successfully! A confirmation email has been sent.');
    }

    /**
     * Display payment history
     */
    public function paymentHistory()
    {
        $user = Auth::user();
        $membership = $user->membership;

        if (!$membership) {
            return redirect()->route('dashboard')->with('error', 'You need a membership to view payment history.');
        }

        $paymentHistory = $this->paymentService->getPaymentHistory($membership->id);

        return view('back.payment-history', compact('paymentHistory'));
    }

    /**
     * Webhook handler for Paystack (recommended)
     */
    public function handleWebhook(Request $request)
    {
        // Verify this is a legitimate Paystack webhook
        $input = $request->getContent();
        $secret = config('services.paystack.secret_key');

        // Validate webhook signature
        if ($request->header('x-paystack-signature') !== hash_hmac('sha512', $input, $secret)) {
            Log::error('Invalid webhook signature');
            return response()->json(['error' => 'Invalid signature'], 403);
        }

        $event = json_decode($input);

        if ($event->event === 'charge.success') {
            $reference = $event->data->reference;

            // Verify the transaction
            $verification = $this->paymentService->verifyPayment($reference);

            if ($verification['success'] && $verification['data']['status'] === 'success') {
                // Find or create payment record
                $paymentData = $verification['data'];
                $metadata = $paymentData['metadata'];

                $paymentHistory = PaymentHistory::firstOrNew([
                    'transaction_reference' => $reference
                ]);

                if (!$paymentHistory->exists) {
                    $paymentHistory->fill([
                        'membership_id' => $metadata['membership_id'] ?? null,
                        'payment_id' => $metadata['payment_id'] ?? null,
                        'amount' => $paymentData['amount'] / 100, // Convert from kobo
                        'payment_method' => $paymentData['channel'],
                        'status' => 'completed',
                        'api_response' => json_encode($paymentData),
                    ])->save();

                    // Send confirmation email if needed
                    if (isset($metadata['membership_id'])) {
                        $membership = Membership::find($metadata['membership_id']);
                        if ($membership && $membership->user) {
                            $payment = Payment::find($metadata['payment_id'] ?? null);
                            $this->paymentService->sendConfirmationEmail(
                                $payment,
                                $membership,
                                $paymentData['amount'] / 100,
                                $membership->user->email
                            );
                        }
                    }
                }
            }
        }

        return response()->json(['status' => 'success']);
    }
}
