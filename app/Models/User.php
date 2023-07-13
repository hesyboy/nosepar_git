<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'mobile',
        'email',
        'password',
        'email_verified_at',
        'email_verified_code',
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

    public function userExperts(){
        return $this->hasMany(UserExpert::class);
    }

    public function userTeamMembers(){
        return $this->hasMany(TeamMember::class);
    }


    public function followings(){
        return $this->hasMany(UserFollowing::class,'id','following_id');
    }

    public function follower(){
        return $this->hasOne(UserFollowing::class,'id','user_id');
    }
}
