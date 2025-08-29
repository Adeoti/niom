<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Auth;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        $payments = PaymentHistory::with(['membership', 'payment'])
            ->where('membership_id', Auth::user()->membership?->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $stats = [
            'total_payments' => PaymentHistory::where('membership_id', Auth::user()->membership?->id)->count(),
            'total_amount' => PaymentHistory::where('membership_id', Auth::user()->membership?->id)
                ->where('status', 'completed')
                ->sum('amount'),
            'successful' => PaymentHistory::where('membership_id', Auth::user()->membership?->id)
                ->where('status', 'completed')
                ->count(),
            'failed' => PaymentHistory::where('membership_id', Auth::user()->membership?->id)
                ->where('status', 'failed')
                ->count(),
        ];

        return view('back.payment-history', compact('payments', 'stats'));
    }

    public function show($id)
    {
        $payment = PaymentHistory::with(['membership', 'payment'])
            ->where('membership_id', Auth::user()->membership->id)
            ->findOrFail($id);

        return view('payment-details', compact('payment'));
    }

    public function download($type)
    {
        $payments = PaymentHistory::with(['membership', 'payment'])
            ->where('membership_id', Auth::user()->membership->id)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($type === 'pdf') {
            $pdf = PDF::loadView('exports.payment-history-pdf', compact('payments'));
            return $pdf->download('payment-history-' . date('Y-m-d') . '.pdf');
        }

        if ($type === 'csv') {
            $filename = 'payment-history-' . date('Y-m-d') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            return response()->stream(function () use ($payments) {
                $file = fopen('php://output', 'w');

                // Add CSV headers
                fputcsv($file, ['Payment ID', 'Description', 'Date', 'Amount', 'Method', 'Status']);

                // Add data
                foreach ($payments as $payment) {
                    fputcsv($file, [
                        $payment->payment_id,
                        $payment->payment->description ?? 'N/A',
                        $payment->created_at->format('Y-m-d'),
                        $payment->amount,
                        $payment->payment_method,
                        ucfirst($payment->status)
                    ]);
                }

                fclose($file);
            }, 200, $headers);
        }

        return back()->with('error', 'Invalid download type specified.');
    }
}
