<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'title',
        'description',
        'owner_id',
        'experts',
        'members',
        'cover_image',
        'profile_image',
    ];

    public function teamMembers(){
        return $this->hasMany(TeamMember::class);
    }

    public function teamExperts(){
        return $this->hasMany(TeamExpert::class);
    }
}
