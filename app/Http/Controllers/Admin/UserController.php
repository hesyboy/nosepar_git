<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    public function delete($code){
        $user=User::where('code',$code)->first();
        $user->delete();
        toast('انجام شد','success');
        return redirect()->back();
    }
}
