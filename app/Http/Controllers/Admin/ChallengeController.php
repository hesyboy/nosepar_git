<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index(){
        return view('admin.challenge.index');
    }

    public function create(){
        return view('admin.challenge.create');
    }
}
