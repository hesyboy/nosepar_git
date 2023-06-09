<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEmailVerifyController extends Controller
{
    public function index(){

        if(Auth::user()->email_verified_at)
        {
            return redirect()->route('panel.index');
        }

        return view('auth.verifyemail');
    }
}
