<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return in_array($this->role, ['admin', 'member']);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class)
            ->withTimestamps()
            ->withPivot('is_active');
    }

    public function membership()
    {
        return $this->hasOne(Membership::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
