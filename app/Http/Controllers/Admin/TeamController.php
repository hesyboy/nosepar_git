<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamExperts;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $teams=Team::all();
        return view('admin.teams.index',compact('teams'));
    }


}
