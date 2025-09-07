<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    //
    protected $fillable = [
        'membership_id',
        'payment_id',
        'amount',
        'payment_method',
        'transaction_reference',
        'api_response',
        'status',
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
