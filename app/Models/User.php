<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'is_online',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function socials(){
        return $this->belongsToMany(Social::class);
    }

    public function messageTo(){
        return $this->hasMany(Message::class,'to_id');
    }
    public function messageFrom(){
        return $this->hasMany(Message::class,'from_id');
    }

    public function receivesBroadcastNotificationsOn()
    {
        \Log::debug('notification.friend.toggle.'.$this->id);
        return 'notification.friend.toggle.'.$this->id;
    }

}
