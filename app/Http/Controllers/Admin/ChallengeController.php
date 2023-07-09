<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index(){
        $challenges = Challenge::all();
        return view('admin.challenge.index',compact('challenges'));
    }

    public function create(){
        return view('admin.challenge.create');
    }

    public function store(Request $request){
        $validated=$request->validate([
            'title' => 'required',
        ]);
        $challenge=new Challenge();
        $challenge->title = $request->title;
        $challenge->law = $request->law;
        $challenge->description = $request->description;
        $challenge->award = $request->award;
        $challenge->organizer = $request->organizer;
        $challenge->start_date = $request->start_date;
        $challenge->end_date = $request->end_date;
        $challenge->discord = $request->discord;
        $challenge->data_link = $request->data_link;

        if($request->image){
            $imgName=rand(100000,99999999);
            $request->image->storeAs('public/challenges/images', $imgName.'.'.$request->image->extension());
            $challenge->image='/storage/challenges/images/'.$imgName.'.'.$request->file('image')->extension();
        }


        $challenge->save();
        toast('انجام شد','success');
        return redirect()->route('admin.challenge.index');
    }

    public function edit($id){
        $challenge=Challenge::find($id);
        return view('admin.challenge.edit',compact('challenge'));
    }


    public function update(Request $request,$id){
        $validated=$request->validate([
            'title' => 'required',
        ]);
        $challenge=Challenge::find($id);
        $challenge->title = $request->title;
        $challenge->law = $request->law;
        $challenge->description = $request->description;
        $challenge->award = $request->award;
        $challenge->organizer = $request->organizer;
        $challenge->start_date = $request->start_date;
        $challenge->end_date = $request->end_date;
        $challenge->discord = $request->discord;
        $challenge->data_link = $request->data_link;

        if($request->image){
            $imgName=rand(100000,99999999);
            $request->image->storeAs('public/challenges/images', $imgName.'.'.$request->image->extension());
            $challenge->image='/storage/challenges/images/'.$imgName.'.'.$request->file('image')->extension();
        }


        $challenge->update();
        toast('انجام شد','success');
        return redirect()->route('admin.challenge.index');
    }

    public function delete($id){
        $challenge=Challenge::find($id);
        $challenge->delete();
        toast('انجام شد','success');
        return redirect()->back();
    }
}
