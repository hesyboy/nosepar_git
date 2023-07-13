<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserExpert;
use Illuminate\Http\Request;

class UserExpertController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.user-experts.index',compact('users'));
    }

    public function upgrade($id){
        $userExpert=UserExpert::find($id);
        if($userExpert->level < 5){
            $userExpert->level++;
            $userExpert->update();
        }
        toast('انجام شد','success');
        return redirect()->back();
    }

    public function downgrade($id){
        $userExpert=UserExpert::find($id);
        if($userExpert->level > 1){
            $userExpert->level--;
            $userExpert->update();
        }
        toast('انجام شد','success');
        return redirect()->back();
    }

    public function delete($id){
        $userExpert=UserExpert::find($id);
        $userExpert->delete();
        toast('انجام شد','success');
        return redirect()->back();
    }
}
