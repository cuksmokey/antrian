<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    public function statuses()
    {
        // banyak data
        return $this->hasMany(Status::class);
    }

    public function follows()
    {
        // user bisa banyak follower
        // follower bisa banyak following
        // tanpa model created updated tidak terisi otomastis jadi harus tambah withTimestamps()
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    // public function timeline()
    // {
    //     $following = $this->follows->pluck('id');
    //     return $statuses = Status::whereIn('user_id', $following)
    //         ->orWhere('user_id', $this->id)
    //         ->latest()
    //         ->get();
    // }

}
