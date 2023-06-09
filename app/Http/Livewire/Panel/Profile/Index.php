<?php

namespace App\Http\Livewire\Panel\Profile;

use App\Models\UserFollowing;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;

    public $following;

    public function mount($user){
        $this->user=$user;
        $following=UserFollowing::where('user_id',Auth::id())->where('following_id',$this->user->id)->get()->first();
        if($following){
            $this->following=true;
        }
        else{
            $this->following=false;
        }

    }

    public function follow(){
        if($this->following==false){
            $following=new UserFollowing();
            $following->user_id=Auth::id();
            $following->following_id = $this->user->id;
            $following->save();
            $this->following=true;
            session()->flash('success', 'پیوند زده شد');

        }
        elseif($this->following==true){
            $following=UserFollowing::where('user_id',Auth::id())->where('following_id',$this->user->id)->get()->first();
            $following->delete();
            $this->following=false;
            session()->flash('danger', 'پیوند قطع شد');
        }

    }
    public function render()
    {


        return view('livewire.panel.profile.index');
    }
}
