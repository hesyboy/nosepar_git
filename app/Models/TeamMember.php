<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'team_id',
        'role',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Team(){
        return $this->belongsTo(Team::class);
    }
}
