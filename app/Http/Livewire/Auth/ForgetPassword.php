<?php

namespace App\Http\Livewire\Auth;

use App\Models\PasswordReset;
use Livewire\Component;

class ForgetPassword extends Component
{
    public $email;

    protected function rules()
    {
        return [
            'email' => ['required','email','exists:users,email',],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $passwordReset=PasswordReset::create([
            'email' => $this->email,
            'token' => md5(rand()),
        ]);
    }

    public function render()
    {
        return view('livewire.auth.forget-password');
    }
}
