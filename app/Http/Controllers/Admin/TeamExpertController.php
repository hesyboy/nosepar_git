<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamExpert;
use Illuminate\Http\Request;
use Alert;
use App\Models\Expert;
use App\Models\Team;

class TeamExpertController extends Controller
{
    public function index(){
        $teams=Team::all();
        return view('admin.team-experts.index',compact('teams'));
    }

    public function upgrade($id){
        $teamExpert=TeamExpert::find($id);
        if($teamExpert->level < 5){
            $teamExpert->level++;
            $teamExpert->update();
        }
        toast('انجام شد','success');
        return redirect()->back();
    }

    public function downgrade($id){
        $teamExpert=TeamExpert::find($id);
        if($teamExpert->level > 1){
            $teamExpert->level--;
            $teamExpert->update();
        }
        toast('انجام شد','success');
        return redirect()->back();
    }

    public function delete($id){
        $teamExpert=TeamExpert::find($id);
        $teamExpert->delete();
        toast('انجام شد','success');
        return redirect()->back();
    }


}
