<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'user_id', // the user that created the event
        'event_name',
        'event_description',
        'event_date',
        'is_active',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
