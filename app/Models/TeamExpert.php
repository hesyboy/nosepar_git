<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamExpert extends Model
{
    use HasFactory;


    protected $fillable=[
        'title',
    ];

    public function expert(){
        return $this->belongsTo(Expert::class,'expert_id','id');
    }
}
