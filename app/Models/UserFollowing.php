<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollowing extends Model
{
    use HasFactory;

    public function following(){
        return $this->hasOne(User::class,'id','following_id');
    }

    public function followers(){
        return $this->hasMany(User::class,'following_id','id');
    }
}
