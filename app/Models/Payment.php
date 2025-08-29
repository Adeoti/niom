<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'is_active',
        'label',
        'payment_targets',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // the user that created the payment (Admin)
    }

    public function paymentHistories()
    {
        return $this->hasMany(PaymentHistory::class);
    }
}
