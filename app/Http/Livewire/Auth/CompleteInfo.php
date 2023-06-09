<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompleteInfo extends Component
{
    public $name,$lastname,$phone,$contact_way;

    protected function rules()
    {
        return [
            'name' => ['required','min:2'],
            'lastname' => ['required','min:2'],
            'phone' => ['required','numeric','digits:10','unique:users,mobile','regex:/9(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}/'],
            'contact_way' => ['required']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();
        $user=Auth::user();
        $user->first_name=$this->name;
        $user->last_name=$this->lastname;
        $user->mobile=$this->phone;
        $user->contact_way=$this->contact_way;

        $user->complete_info_at=now();
        $user->save();


        return redirect()->route('panel.index');
    }
    public function render()
    {
        return view('livewire.auth.complete-info');
    }
}
