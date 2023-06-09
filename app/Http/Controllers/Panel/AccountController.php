<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class AccountController extends Controller
{
    public function index(){
        return view('panel.account.index');
    }

    public function update(Request $request){

        $user=Auth::user();

        $validated=$request->validate([
            "email" => 'required|email',
            "mobile" => 'required|numeric'
        ]);

        $user->email=$request->email;
        $user->mobile=$request->mobile;
        if($request->receive_event){
            $user->receive_event=1;
        }
        else
            $user->receive_event=0;

        if($request->receive_team_request){
            $user->receive_team_request=1;
        }
        else
            $user->receive_team_request=0;


        $user->update();

        toast('انجام شد','success');

        return redirect()->back();
    }
}
