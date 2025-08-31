<?php

namespace App\Mail;

use App\Models\Payment;
use App\Models\Membership;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $membership;
    public $amount;

    public function __construct(Payment $payment, Membership $membership, $amount)
    {
        $this->payment = $payment;
        $this->membership = $membership;
        $this->amount = $amount;
    }

    public function build()
    {
        return $this->subject('Payment Confirmation - ' . config('app.name'))
                    ->view('emails.payment-confirmation');
    }
}