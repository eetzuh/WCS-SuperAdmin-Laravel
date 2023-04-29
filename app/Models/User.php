<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'super_admin',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function friendsFrom()
    {
        return $this->belongsToMany(User::class, 'friends','user_id', 'friend_id')->withPivot('status')
            ->wherePivot('friend_id', auth()->user()->id);
    }
    public function friendsTo()
    {
        return $this->belongsToMany(User::class, 'friends','friend_id', 'user_id')->withPivot('status')
            ->wherePivot('status', false);
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends')->withPivot('status');
    }

    public function friendsFromAccepted()
    {
        return $this->belongsToMany(User::class, 'friends','user_id', 'friend_id')
            ->wherePivot('status', true)->withPivot('status');
    }

    public function friendsWithAccepted()
    {
        return $this->belongsToMany(User::class, 'friends','friend_id', 'user_id')
            ->wherePivot('status', true)->withPivot('status');
    }
}
