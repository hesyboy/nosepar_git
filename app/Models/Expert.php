<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'image',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];

    public function teamexperts(){
        return $this->hasMany(TeamExpert::class,'expert_id','id');
    }

    public function userexperts(){
        return $this->hasMany(UserExpert::class,'expert_id','id');
    }

}
