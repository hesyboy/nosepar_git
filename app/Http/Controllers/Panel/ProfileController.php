<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('panel.profile.index');
    }

    public function show($code){
        try {
            $user=User::where('code',$code)->get()->first();
            // dd($user);
            return view('panel.profile.show',compact('user'));
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
}
