<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $newuser=User::where('email',$user->email)->first();
            if($newuser){
                $newuser->email_verified_at = now();
                $newuser->update();
                Auth::loginUsingId($newuser->id);
                return redirect()->route('panel.index');

            }
            else{
                $newuser=new User();
                $newuser->email=$user->email;
                $newuser->password=Hash::make(\Str::random(8));

                $userCode=random_int(10000,999999);
                while(User::where('code',$userCode)->exists()){
                    $userCode=random_int(10000,999999);
                }
                $newuser->code=$userCode;
                $newuser->email_verified_at = now();
                $newuser->save();
                Auth::loginUsingId($newuser->id);
                return redirect()->route('panel.index');


            }

            // return redirect()->route('panel.index');
        } catch (\Throwable $th) {
            throw $th;
            // return 'error';
        }

    }
}
