<?php

namespace App\Http\Livewire\Panel\Team;

use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowTeam extends Component
{
    public Team $team;
    public $members;

    public function mount(Team $team){
        $this->team=$team;
        $this->members=TeamMember::where('team_id',$this->team->id)->get();
    }


    public function enterTeam(){

        if (!$this->team->teamMembers->where('user_id','=',Auth::id())->first()){
            $teamMember = new TeamMember();
            $teamMember->user_id = Auth::id();
            $teamMember->team_id = $this->team->id;
            $teamMember->role = 0;
            $teamMember->save();
            session()->flash('success', 'عضویت شما در تیم انجام شد');
        }
        else{
            dd('شما عضو تیم هستید');
        }
    }

    public function exitTeam(){
        $teamMember=TeamMember::where('team_id',$this->team->id)->where('user_id',Auth::id())->first();
        $teamMember->delete();
        session()->flash('danger', 'خروج شما از تیم انجام شد');

    }

    public function render()
    {
        $this->members=TeamMember::where('team_id',$this->team->id)->get();
        return view('livewire.panel.team.show-team');
    }
}
