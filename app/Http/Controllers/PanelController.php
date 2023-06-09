<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(){
        return redirect()->route('panel.teams.index');
    }

    public function team(){
        return view('panel.teams');
    }
}
