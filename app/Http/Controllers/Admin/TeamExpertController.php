<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamExpert;
use Illuminate\Http\Request;
use Alert;

class TeamExpertController extends Controller
{
    public function index(){
        $experts=TeamExpert::all();
        return view('admin.teams.experts.index',compact('experts'));
    }

    public function create(){
        return view('admin.teams.experts.create');
    }

    public function store(Request $request){
        $validated=$request->validate([
            'title' => 'required',
        ]);

        $expert=new TeamExpert();
        $expert->title=$request->title;
        $expert->save();
        toast('انجام شد','success');
        return redirect()->route('admin.teams.experts.index');
    }


}
