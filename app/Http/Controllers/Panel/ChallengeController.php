<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    public function index(){
        // $myChallenge=Challenge::where('owner',Auth::id())->get();
        // $allChallenge=Challenge::all();
        return view('panel.challenge.index');
    }

    public function show(){
        return view('panel.challenge.show');
    }
}
