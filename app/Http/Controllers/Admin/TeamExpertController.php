<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamExpert;
use Illuminate\Http\Request;
use Alert;
use App\Models\Expert;

class TeamExpertController extends Controller
{
    public function index(){
        $experts=Expert::all();
        return view('admin.teams.experts.index',compact('experts'));
    }

    public function create(){
        return view('admin.teams.experts.create');
    }

    public function store(Request $request){
        // dd($request->image);
        $validated=$request->validate([
            'title' => 'required',

        ]);


        $expert=new Expert();
        $expert->title=$request->title;

        if($request->image){
            $imgName=rand(100000,99999999);
            $request->image->storeAs('public/experts/images', $imgName.'.'.$request->image->extension());
            $expert->image='/storage/experts/images/'.$imgName.'.'.$request->file('image')->extension();

        }
        $expert->save();
        toast('انجام شد','success');
        return redirect()->route('admin.teams.experts.index');
    }


    public function delete($id){
        $expert=Expert::find($id);
        $expert->delete();
        toast('انجام شد','success');
        return redirect()->back();
    }


}
