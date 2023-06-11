<?php

namespace App\Http\Livewire\Auth;

use App\Jobs\RegisterEmailVerification;
use App\Mail\EmailVerification as MailEmailVerification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class EmailVerification extends Component
{
    public $code,$input,$user;

    public $timer;


    protected $rules = [
        'input' => 'required|digits:4|same:code',
    ];

    public function mount(){

        $this->user=Auth::user();
        $this->sendCode();
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function timer(){
            $this->timer=$this->timer-1;
    }

    public function sendCode(){



        $this->timer=10;
        $this->code=strval(rand(1000,9999));

        $this->user->email_verified_code = $this->code;
        $this->user->save();

        // Mail::to($this->user->email)->send(new MailEmailVerification($this->user));

        Mail::to($this->user->email)->send(new MailEmailVerification());


        // RegisterEmailVerification::dispatch();



    }

    public function save(){

        $this->validate();

        $this->user->email_verified_at = now();
        $this->user->save();

        // sleep(1);

        return redirect()->route('panel.index');
    }

    public function render()
    {
        return view('livewire.auth.email-verification');
    }
}
