<?php

namespace App\Http\Livewire\Auth;

use App\Jobs\RegisterEmailVerification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;

class Register extends Component
{
    public $email,$password,$password_confirmation,$law;

    // protected $rules = [
    //     'email' => ['required','email','unique:users'],
    //     'password' => ['required', Password::min(8)],
    //     'password_confirmation'  => ['required','same:password'],
    //     'law' => ['accepted'],
    // ];

    public function mount(){
        $this->law=1;
    }

    protected function rules()
    {
        return [
            'email' => ['required','email','unique:users','regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'],
            'password' => ['required', Password::min(6)],
            'password_confirmation'  => ['required','same:password'],
            'law' => ['accepted'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();


        $userCode=random_int(10000,999999);
        while(User::where('code',$userCode)->exists()){
            $userCode=random_int(10000,999999);
        }

        $user = User::create([
            'code' => $userCode,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // event(new Registered($user));

        // sleep(1);


        Auth::login($user);


        // try {
        //     Mail::to($this->email)->send(new EmailVerification());

        // } catch (\Throwable $th) {
        //     throw $th;
        // }

        // RegisterEmailVerification::dispatch($user);

        return redirect()->route('panel.index');


    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
