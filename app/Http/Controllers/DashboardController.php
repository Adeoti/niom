<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $membership = Membership::where('user_id', $user->id)->first();

        if(!$membership){
            abort(404);
        }

        // Get upcoming events (next 30 days)
        $upcomingEvents = Event::where('event_date', '>=', now())
            ->where('is_active', true)
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        // Get active payments that user hasn't paid yet
        $activePayments = Payment::where('is_active', true)->get();
        $pendingPayments = [];

        foreach ($activePayments as $payment) {
            $hasPaid = PaymentHistory::where('payment_id', $payment->id)
                ->where('membership_id', $membership->id)
                ->where('status', 'success')
                ->exists();

            if (!$hasPaid) {
                $pendingPayments[] = $payment;
            }
        }

        // Calculate total pending amount
        $pendingAmount = collect($pendingPayments)->sum('amount');

        // Calculate membership duration

        if ($membership->approval_date) {
            $years = floor($membership->approval_date->diffInRealYears());
            $months = $membership->approval_date->diffInMonths(now()) % 12;

            if ($years > 0) {
                $memberSince = $years . ' year' . ($years > 1 ? 's' : '');
            } else {
                if ($months > 0) {
                    $memberSince = $months . ' month' . ($months > 1 ? 's' : '');
                } else {
                    $memberSince = 'New member';
                }
            }
        } else {
            $memberSince = 'New member';
        }


        $pendingData = app(PaymentService::class)->getPendingPayments($membership);

        $pendingPayments = $pendingData['pending_payments'];
        $pendingAmount = $pendingData['stats']['total_due'];


        // dd($pendingPayments, $pendingAmount);

        return view('back.dashboard', compact(
            'membership',
            'upcomingEvents',
            'pendingPayments',
            'pendingAmount',
            'memberSince'
        ));
    }
}
