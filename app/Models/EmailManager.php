<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailManager extends Model
{
    //
    protected $fillable = ['user_id', 'name', 'subject', 'body', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
