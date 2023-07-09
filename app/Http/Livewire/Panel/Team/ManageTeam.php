<?php

namespace App\Http\Livewire\Panel\Team;

use App\Models\Expert;
use App\Models\Team;
use App\Models\TeamExpert;
use App\Models\TeamMember;
use Livewire\Component;
use Livewire\WithFileUploads;


class ManageTeam extends Component
{

    use WithFileUploads;

    public Team $team;

    public $member,$members;

    public $name,$title,$description;
    public $profile_image,$cover_image;
    public $github,$linkedin,$kaggle;

    public $experts,$expertSearch;
    public $selectedExperts=[];



    public function mount(Team $team){
        $this->team = $team;
        $this->name = $this->team->name;
        $this->title = $this->team->title;
        $this->description = $this->team->description;

        $this->github = $this->team->github;
        $this->linkedin = $this->team->linkedin;
        $this->kaggle = $this->team->kaggle;

        $this->members = $team->teamMembers;

        $this->experts=Expert::all();

        foreach(TeamExpert::where('team_id',$this->team->id)->get() as $ii){
               array_push($this->selectedExperts,$ii->expert_id) ;
        };

        // $this->selectedExperts = TeamExpert::where('team_id',$this->team->id)->get();
        // dd($this->members);
    }

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

    public function upgradeAccess(TeamMember $member){
        $this->member=$member;
        $this->member->role=1;
        $this->member->save();
        $this->members = TeamMember::where('team_id',$this->team->id)->get();

        // session()->flash('success', ' ارتقا دسترسی انجام شد ');
        return redirect()->route('panel.teams.manage',$this->team->id)->with(['success' => ' ارتقا دسترسی انجام شد ']);

    }

    public function downgradeAccess(TeamMember $member){
        $this->member=$member;
        $this->member->role=0;
        $this->member->save();
        $this->members = TeamMember::where('team_id',$this->team->id)->get();

        // session()->flash('success', ' کاهش دسترسی انجام شد ');
        return redirect()->route('panel.teams.manage',$this->team->id)->with(['success' => ' کاهش دسترسی انجام شد ']);


    }

    public function acceptMember(TeamMember $member){
        $this->member=$member;
        $this->member->status=1;
        $this->member->save();
        $this->members = TeamMember::where('team_id',$this->team->id)->get();

        // session()->flash('success', ' تایید عضویت انجام شد ');
        return redirect()->route('panel.teams.manage',$this->team->id)->with(['success' => ' تایید عضویت انجام شد ']);

    }

    public function deleteMember(TeamMember $member){
        $this->member=$member;
        $this->member->delete();
        $this->members = TeamMember::where('team_id',$this->team->id)->get();

        // session()->flash('danger', ' حذف عضو انجام شد ');
        return redirect()->route('panel.teams.manage',$this->team->id)->with(['danger' => ' حذف عضو انجام شد ']);


    }

    public function save1(){
        $this->team->name = $this->name;
        $this->team->title = $this->title;
        $this->team->description = $this->description;
        $this->team->update();

        // session()->flash('success', 'ثبت و بروزرسانی اطلاعات کلی انجام شد. ');
        return redirect()->route('panel.teams.manage',$this->team->id)->with(['success' => ' ثبت و بروزرسانی اطلاعات کلی انجام شد.']);

    }

    public function save2(){

        $this->team->github = $this->github ;
        $this->team->linkedin = $this->linkedin ;
        $this->team->kaggle = $this->kaggle ;
        $this->team->update();

        // session()->flash('success', ' ثبت و بروز رسانی شبکه های اجتماعی  انجام شد ');
        return redirect()->route('panel.teams.manage',$this->team->id)->with(['success' => ' ثبت و بروز رسانی شبکه های اجتماعی  انجام شد ']);

    }

    public function save3(){

        // $mine=TeamExpert::where('team_id',$this->team->id)->delete;
        // dd($mine);
        foreach(TeamExpert::where('team_id',$this->team->id)->get() as $ii){
            $ii->delete() ;
        };


        foreach($this->selectedExperts as $item){
            $expert=new TeamExpert();
            $expert->team_id = $this->team->id;
            $expert->expert_id = $item;
            $expert->save();
        }

        // $this->team=$this->team;
        // session()->flash('success', ' ثبت و بروز رسانی تخصص ها انجام شد ');
        return redirect()->route('panel.teams.manage',$this->team->id)->with(['success' => ' ثبت و بروز رسانی تخصص ها انجام شد ']);


    }


    public function deleteTeam(){
        $this->team->delete();
        return redirect()->route('panel.teams.index');
    }
    public function render()
    {

        return view('livewire.panel.team.manage-team');
    }
}
