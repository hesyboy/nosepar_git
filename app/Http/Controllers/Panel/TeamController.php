<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamExpert;
use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index(){
        $myTeams=new Collection();
        $myTeamMembers=TeamMember::where('user_id',Auth::id())->get();
        foreach($myTeamMembers as $myTeamMember){
            $myTeams->push(Team::find($myTeamMember->team_id));
        }
        // dd($myTeams);

        $allTeams=Team::all();
        return view('panel.team.index',compact('myTeams','allTeams'));
    }

    public function create(){
        $teamExperts=TeamExpert::all();
        return view('panel.team.create',compact('teamExperts'));
    }

    public function store(Request $request){
        $validated=$request->validate([
            'name' => 'required',
        ]);
        $team=new Team();


        $team->name=$request->name;
        $team->experts=json_encode($request->experts);
        $team->owner=Auth::id();

        $team->save();

        toast('انجام شد','success');

        return redirect()->route('panel.teams.index');
    }


    public function show($id){
        $team=Team::find($id);
        $teamMember=$team->teamMembers;
        return view('panel.team.show',compact('team','teamMember'));
    }


    public function manage($id){
        $team=Team::find($id);
        if($team->owner_id == Auth::id() || $team->teamMembers->where('user_id',auth()->id())->first()->role == 1 )
            return view('panel.team.manage',compact('team',));
        else
        return 'Access Deny';
    }
}
