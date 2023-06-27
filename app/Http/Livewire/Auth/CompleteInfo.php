<?php

namespace App\Http\Livewire\Auth;

use App\Mail\Welcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CompleteInfo extends Component
{
    public $name,$lastname,$phone,$contact_way;


    public $user;
    public function mount(){
        $this->user=Auth::user();
    }
    protected function rules()
    {
        return [
            'name' => ['required','min:2'],
            'lastname' => ['required','min:2'],
            'phone' => ['required','numeric','digits:9','unique:users,mobile','regex:/(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}/'],
            'contact_way' => ['required']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        // dd($this->user->email);
        $this->validate();

        $this->user->first_name=$this->name;
        $this->user->last_name=$this->lastname;
        $this->user->mobile=$this->phone;
        $this->user->contact_way=$this->contact_way;

        $this->user->complete_info_at=now();

        $this->user->save();

        Mail::to($this->user->email)->queue(new Welcome($this->user));

        return redirect()->route('panel.index');
    }
    public function render()
    {
        return view('livewire.auth.complete-info');
    }
}
