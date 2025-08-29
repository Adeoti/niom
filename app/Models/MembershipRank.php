<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipRank extends Model
{
    //
    protected $fillable = [
        'name',
        'level',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}
