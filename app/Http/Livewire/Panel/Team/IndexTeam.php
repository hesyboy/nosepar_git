<?php

namespace App\Http\Livewire\Panel\Team;

use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use App\Models\UserFollowing;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTeam extends Component
{
    use WithPagination;
    public $myTeams,$allTeams,$myTeamMembers;

    public $allUsers,$userFollowings;

    public $search_team,$search_user;

    public $page1,$myTeamsView;

    public $page2,$userFollowingsView;



    // public $team;

    public function mount(){
        // $this->myTeams=[];
        // $this->allTeams=[];
        $this->search_team="";
        $this->userFollowings=UserFollowing::where('user_id',Auth::id())->get();

        $this->page1=1;
        $this->page2=1;
    }

    public function myUpdater(){


    }



    public function enterTeam($id){
        $team=Team::find($id);
        if (!$team->teamMembers->where('user_id','=',Auth::id())->first()){
            $teamMember = new TeamMember();
            $teamMember->user_id = Auth::id();
            $teamMember->team_id = $team->id;
            $teamMember->role = 0;
            $teamMember->save();
            session()->flash('success', 'عضویت شما در تیم انجام شد');
        }
        else{
            // dd('شما عضو تیم هستید');
        }

    }


    public function exitTeam($id){
        $team=Team::find($id);
        $teamMember=TeamMember::where('team_id',$team->id)->where('user_id',Auth::id())->first();
        $teamMember->delete();
        session()->flash('danger', 'خروج شما از تیم انجام شد');

    }


    public function pagination1($page){
        $this->page1=$page;
    }

    public function pagination2($page){
        $this->page2=$page;
    }


    public function follow($id){
        $following1=UserFollowing::where('user_id',Auth::id())->where('following_id',$id)->get()->first();
        if($following1){
            $following=true;
        }
        else{
            $following=false;
        }

        if($following==false){
            $following=new UserFollowing();
            $following->user_id=Auth::id();
            $following->following_id = $id;
            $following->save();
            $following=true;
            session()->flash('success', 'پیوند زده شد');

        }
        elseif($following==true){
            $following1=UserFollowing::where('user_id',Auth::id())->where('following_id',$id)->get()->first();
            $following1->delete();
            $following=false;
            session()->flash('danger', 'پیوند قطع شد');
        }

    }


    public function render()
    {
        $this->myTeams=new Collection();
        $this->myTeamMembers=TeamMember::where('user_id',Auth::id())->get();
        foreach($this->myTeamMembers as $myTeamMember){
            $this->myTeams->push(Team::find($myTeamMember->team_id));
        }
        if($this->search_team != null)
            $this->allTeams=Team::where('name','like','%'.$this->search_team.'%')->get();
        else
            $this->allTeams=Team::all();


        $this->userFollowings=UserFollowing::where('user_id',Auth::id())->get();




        if($this->search_user != null)
            $this->allUsers=User::where('first_name','like','%'.$this->search_user.'%')
            ->orWhere('last_name','like','%'.$this->search_user.'%')
            ->get();
        else
            $this->allUsers=User::all();


            $this->myTeamsView=new Collection();
            for($i=($this->page1-1)*10;$i<$this->page1*10;$i++){
                if($i<$this->myTeams->count()){
                    $this->myTeamsView->push($this->myTeams[$i]);
                }
            }

            // $this->userFollowings
            $this->userFollowingsView=new Collection();
            for($i=($this->page2-1)*10;$i<$this->page2*10;$i++){
                if($i<$this->userFollowings->count()){
                    $this->userFollowingsView->push($this->userFollowings[$i]);
                }
            }
            // dd($this->myTeams[0]);

        return view('livewire.panel.team.index-team');
    }
}
