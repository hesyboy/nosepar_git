<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCompleteInfoController extends Controller
{
    public function index(){

        if(Auth::user()->complete_info_at)
        {
            return redirect()->route('panel.index');
        }

        return view('auth.completeinfo');
    }
}
