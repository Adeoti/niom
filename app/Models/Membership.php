<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Membership extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'type',
        'surname',
        'first_name',
        'middle_name',
        'date_of_birth',
        'nationality',
        'phone',
        'address',
        'passport_path',
        'status',
        'application_date',
        'approval_date',
        'featured_on_homepage',
        'institution',
        'biography',
        'membership_rank_id',
        'qualification',
        'is_exco',
        'is_council',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'application_date' => 'datetime',
        'approval_date' => 'datetime',
        'featured_on_homepage' => 'boolean',
        'is_exco' => 'boolean',
        'is_council' => 'boolean',

    ];

    public function rank()
    {
        return $this->belongsTo(MembershipRank::class, 'membership_rank_id');
    }

    // Send payment link email to the user
    public function sendPayment()
    {
        // Logic to send payment
        // $this->user->notify(new PaymentLinkNotification($this));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPassportUrlAttribute()
    {
        return $this->passport_path ? Storage::url($this->passport_path) : null;
    }
}
