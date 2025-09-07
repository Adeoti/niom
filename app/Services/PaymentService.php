<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Membership;
use App\Models\PaymentHistory;
use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    protected $paystackService;

    public function __construct(PaystackService $paystackService)
    {
        $this->paystackService = $paystackService;
    }

    /**
     * Initialize a Paystack payment
     */
    public function initializePayment(Payment $payment, Membership $membership, $amount, $email)
    {
        try {
            // Create a unique reference
            $reference = 'PY_' . uniqid() . '_' . time();

            // Prepare transaction data
            $transactionData = [
                'email' => $email,
                'amount' => $amount * 100, // Convert to kobo
                'reference' => $reference,
                'callback_url' => route('payment.callback'),
                'metadata' => json_encode([
                    'payment_id' => $payment->id,
                    'membership_id' => $membership->id,
                    'custom_fields' => [
                        [
                            'display_name' => "Membership ID",
                            'variable_name' => "membership_id",
                            'value' => $membership->id
                        ],
                        [
                            'display_name' => "Payment For",
                            'variable_name' => "payment_for",
                            'value' => $payment->name
                        ]
                    ]
                ])
            ];

            // Initialize payment with Paystack
            $result = $this->paystackService->initializeTransaction($transactionData);

            if (!$result['success']) {
                return $result;
            }

            return [
                'success' => true,
                'authorization_url' => $result['data']['authorization_url'],
                'reference' => $reference
            ];
        } catch (\Exception $e) {
            Log::error('Payment initialization error: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to initialize payment. Please try again.'
            ];
        }
    }

    /**
     * Verify a Paystack payment
     */
    public function verifyPayment($reference)
    {
        return $this->paystackService->verifyTransaction($reference);
    }

    /**
     * Record payment in history
     */
    public function recordPayment($paymentId, $membershipId, $amount, $reference, $paymentMethod = 'paystack', $apiResponse = null)
    {
        try {
            $paymentHistory = PaymentHistory::create([
                'membership_id' => $membershipId,
                'payment_id' => $paymentId,
                'amount' => $amount,
                'payment_method' => $paymentMethod,
                'status' => 'completed',
                'transaction_reference' => $reference,
                'api_response' => $apiResponse ? json_encode($apiResponse) : null,
            ]);

            return $paymentHistory;
        } catch (\Exception $e) {
            Log::error('Payment recording error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send payment confirmation email
     */
    public function sendConfirmationEmail($payment, $membership, $amount, $email)
    {
        try {
            Mail::to($email)->send(new PaymentConfirmation($payment, $membership, $amount));
            return true;
        } catch (\Exception $e) {
            Log::error('Payment confirmation email error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get payment history for a membership
     */
    public function getPaymentHistory($membershipId, $paginate = 10)
    {
        return PaymentHistory::where('membership_id', $membershipId)
            ->with('payment')
            ->orderBy('created_at', 'desc')
            ->paginate($paginate);
    }

    /**
     * Get pending payments for a membership
     */
    public function getPendingPayments($membership)
    {
        $activePayments = Payment::where('is_active', true)
            ->where(function ($query) {
                $query->where('payment_targets', 'all')
                    ->orWhere('type', '!=', 'application_fee');
            })
            ->get();

        $pendingPayments = [];
        $totalDue = 0;
        $overdueCount = 0;
        $dueSoonCount = 0;

        // $transaction_fee = Paystack charges
        $transaction_fee = config('paystack.paramount_charges_flat', 500);
        $transaction_fee += config('paystack.paystack_charges_flat', 100);


        // Add transaction fee to total due
        // $totalDue += $transaction_fee;


        foreach ($activePayments as $payment) {
            $hasPaid = PaymentHistory::where('payment_id', $payment->id)
                ->where('membership_id', $membership->id)
                ->where('status', 'completed')
                ->exists();

            if (!$hasPaid) {
                $dueStatus = $this->getDueStatus($payment);

                $transaction_fee += ($payment->amount * config('paystack.paystack_charges_percentage', 1.5) / 100);

                $pendingPayments[] = [
                    'transaction_fee' => $transaction_fee,
                    'payment' => $payment,
                    'due_status' => $dueStatus,
                ];

                $totalDue += $payment->amount;

                if ($dueStatus === 'overdue') {
                    $overdueCount++;
                } elseif ($dueStatus === 'due_soon') {
                    $dueSoonCount++;
                }
            }
        }

        return [
            'pending_payments' => $pendingPayments,
            'stats' => [
                'pending_count' => count($pendingPayments),
                'total_due' => $totalDue,
                'overdue_count' => $overdueCount,
                'due_soon_count' => $dueSoonCount,
            ]
        ];
    }

    /**
     * Determine the due status of a payment
     */
    private function getDueStatus($payment)
    {
        $dueDate = $payment->due_date;

        if ($dueDate) {
            $now = now();
            if ($dueDate < $now) {
                return 'overdue';
            } elseif ($dueDate->diffInDays($now) <= 7) {
                return 'due_soon';
            }
        }

        return 'pending';
    }
}
