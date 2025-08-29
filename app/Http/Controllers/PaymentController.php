<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Membership;
use App\Models\PaymentHistory;

class PaymentController extends Controller
{
    /**
     * Display pending payments for the authenticated user
     */
    public function pending()
    {
        $user = Auth::user();
        $membership = Membership::where('user_id', $user->id)->first();

        if (!$membership) {
            return redirect()->route('dashboard')->with('error', 'You need a membership to view pending payments.');
        }

        // Get all active payments
        // Where payment_targets = either
        $activePayments = Payment::where('is_active', true)
            ->where('payment_targets', 'all')
            ->orWhere('type', '!=', 'application_fee')
            ->get();

        // Filter payments that user hasn't paid yet
        $pendingPayments = [];
        $totalDue = 0;
        $overdueCount = 0;
        $dueSoonCount = 0;

        foreach ($activePayments as $payment) {
            $hasPaid = PaymentHistory::where('payment_id', $payment->id)
                ->where('membership_id', $membership->id)
                ->where('status', 'completed')
                ->exists();

            if (!$hasPaid) {
                // Calculate due status
                $dueStatus = $this->getDueStatus($payment);

                $pendingPayments[] = [
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

        $stats = [
            'pending_count' => count($pendingPayments),
            'total_due' => $totalDue,
            'overdue_count' => $overdueCount,
            'due_soon_count' => $dueSoonCount,
        ];

        return view('back.pending-payments', compact('pendingPayments', 'stats', 'membership'));
    }

    /**
     * Determine the due status of a payment
     */

    private function getDueStatus($payment)
    {
        $due_date = $payment->due_date; // Assuming 'due_date' is a date field in payments table

        if ($due_date) {
            $now = now();
            if ($due_date < $now) {
                return 'overdue';
            } elseif ($due_date->diffInDays($now) <= 7) {
                return 'due_soon';
            }
        }

        return 'pending';
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

        $membership = Auth::user()->membership;

        if (!$membership) {
            return redirect()->back()->with('error', 'You need a membership to make payments.');
        }

        // Process the payment (integration with payment gateway would go here)
        // For now, we'll simulate a successful payment

        // Create payment history record
        PaymentHistory::create([
            'membership_id' => $membership->id,
            'payment_id' => $payment->id,
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => 'completed',
            'api_response' => json_encode([
                'reference' => 'PAY-' . uniqid(),
                'status' => 'success',
                'message' => 'Payment processed successfully'
            ]),
        ]);

        return redirect()->route('payment.history.index')
            ->with('success', 'Payment processed successfully!');
    }
}
