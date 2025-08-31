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
        'location',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot('is_active');
    }
    protected $casts = [
        'event_date' => 'datetime',
        'is_active' => 'boolean',
    ];
}
