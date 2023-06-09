<?php

namespace App\Http\Livewire\Panel;

use App\Models\Expert;
use App\Models\Team;
use App\Models\TeamExpert;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Nette\Utils\Random;
use PhpParser\Node\Expr\FuncCall;

class TeamCreateModal extends Component
{
    use WithFileUploads;

    public $stepper;
    public $name,$title,$description,$cover_image,$profile_image;
    public $linkedin,$github,$kaggle;
    public $userMember;
    public $userMemberSelector=[];
    public $users;

    public $experts,$expertSearch;
    public $selectedExperts=[];

    public $email_invite,$email_invites;

    public function mount(){
        $this->email_invite = null;
        $this->stepper=0;
        $this->email_invites=[];
        $this->userMemberSelector=[];

        $this->experts=Expert::all();
        // $this->users=User::all()->except(Auth::id());
    }

    public $rules=[
        'name' => 'required',
        'title' => 'required',
        'description' => 'required',
        'cover_image' => 'image|max:1024',
        'profile_image' => 'image|max:1024',
        'email_invite' =>'required|email',
    ];

    public function addTeamExpret($id){
        if(!in_array($id,$this->selectedExperts)){
            array_push($this->selectedExperts,$id);
        }
    }


    public function removeTeamExpret($id){
        if(in_array($id,$this->selectedExperts)){
            unset($this->selectedExperts[array_search($id, $this->selectedExperts)]);
        }
    }

    public function updatedExpertSearch(){
        $this->experts=Expert::where('title','like','%'.$this->expertSearch.'%')->get();
    }

    public function updatedUserMember(){
        $this->users=User::where('first_name','like','%'.$this->userMember.'%')
        ->orWhere('last_name','like','%'.$this->userMember.'%')
        ->get()
        ->except(Auth::id());
    }

    public function previous_page(){
        if($this->stepper>=1){
            $this->stepper--;
        }

    }

    public function addEmailInvite(){
        $this->validateOnly('email_invite');
        array_push($this->email_invites,$this->email_invite);
    }

    public function removeEmailInvite($key){
        unset($this->email_invites[$key]);
    }

    public function step1(){
        $this->validateOnly('name');
        $this->validateOnly('title');
        $this->validateOnly('description');
        $this->validateOnly('profile_image');
        $this->validateOnly('cover_image');
        $this->stepper=1;
    }

    public function step2(){
        $this->users=User::all()->except(Auth::id());
        $this->stepper=2;
    }

    public function step3(){
        // dd($this->userMemberSelector);
        $this->stepper=3;
    }

    public function save(){
        // $this->validate();

        $team=new Team();
        $team->name = $this->name;
        $team->title = $this->title;
        $team->description = $this->description;
        $team->owner_id = Auth::id();

        $imgName=rand(100000,99999999);
        $this->cover_image->storeAs('public/teams/images', $imgName.'.'.$this->profile_image->extension());
        $team->cover_image='/storage/teams/images/'.$imgName.'.'.$this->cover_image->extension();

        $imgName=rand(100000,99999999);
        $this->profile_image->storeAs('public/teams/images', $imgName.'.'.$this->profile_image->extension());
        $team->profile_image='/storage/teams/images/'.$imgName.'.'.$this->profile_image->extension();

        $team->save();

        $teamMember = new TeamMember();
        $teamMember->user_id = Auth::id();
        $teamMember->team_id = $team->id;
        $teamMember->role = 1;
        $teamMember->save();

        foreach($this->userMemberSelector as $usermember){
            if($usermember != false){
                $teamMember = new TeamMember();
                $teamMember->user_id = $usermember;
                $teamMember->team_id = $team->id;
                $teamMember->role = 0;
                $teamMember->save();
            }
        }

        foreach($this->selectedExperts as $item){
            $expert=new TeamExpert();
            $expert->team_id = $team->id;
            $expert->expert_id = $item;
            $expert->save();
        }

        session()->flash('success', ' ثبت تیم جدید انجام شد ');

        return redirect()->route('panel.teams.index');

    }





    public function render()
    {
        return view('livewire.panel.team-create-modal');
    }
}
