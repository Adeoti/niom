<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Membership;

class PaymentController extends Controller
{
    /**
     * Display pending payments for the authenticated user
     */
    public function pending()
    {
        // Get pending payments for the current user
        // This would need to be adjusted based on your application's logic
        // for determining which payments are pending for a user




        $pendingPayments = Payment::where('is_active', true)
            ->with(['paymentHistories' => function ($query) {
                $member_id = Membership::where('user_id', Auth::id())->select('id');
                $query->where('membership_id', $member_id);
            }])
            ->get()
            ->filter(function ($payment) {
                // Filter logic to determine if payment is pending for this user
                return $payment->paymentHistories->isEmpty(); // Example condition
            });

        return view('back.pending-payments', compact('pendingPayments'));
    }

    /**
     * Process a payment
     */
    public function process(Request $request, Payment $payment)
    {
        // Validate the request
        $validated = $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Process the payment (integration with payment gateway would go here)

        // Create payment history record
        $payment->paymentHistories()->create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => 'completed', // This would be determined by payment gateway response
            'transaction_id' => uniqid('trans_'), // This would come from payment gateway
        ]);

        return redirect()->route('pending-payments')
            ->with('success', 'Payment processed successfully!');
    }
}
