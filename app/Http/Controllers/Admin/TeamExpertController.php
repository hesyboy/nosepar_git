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

        if($request->image1){
            $imgName=rand(100000,99999999);
            $request->image1->storeAs('public/experts/images', $imgName.'.'.$request->image1->extension());
            $expert->image1='/storage/experts/images/'.$imgName.'.'.$request->file('image1')->extension();
        }
        if($request->image2){
            $imgName=rand(100000,99999999);
            $request->image2->storeAs('public/experts/images', $imgName.'.'.$request->image2->extension());
            $expert->image2='/storage/experts/images/'.$imgName.'.'.$request->file('image2')->extension();
        }
        if($request->image3){
            $imgName=rand(100000,99999999);
            $request->image3->storeAs('public/experts/images', $imgName.'.'.$request->image3->extension());
            $expert->image3='/storage/experts/images/'.$imgName.'.'.$request->file('image3')->extension();
        }
        if($request->image4){
            $imgName=rand(100000,99999999);
            $request->image4->storeAs('public/experts/images', $imgName.'.'.$request->image4->extension());
            $expert->image4='/storage/experts/images/'.$imgName.'.'.$request->file('image4')->extension();
        }
        if($request->image5){
            $imgName=rand(100000,99999999);
            $request->image5->storeAs('public/experts/images', $imgName.'.'.$request->image5->extension());
            $expert->image5='/storage/experts/images/'.$imgName.'.'.$request->file('image5')->extension();
        }

        $expert->save();
        toast('انجام شد','success');
        return redirect()->route('admin.teams.experts.index');
    }


    public function edit($id){
        $expert=Expert::find($id);
        return view('admin.teams.experts.edit',compact('expert'));
    }

    public function update(Request $request,$id){
        // dd($request->image);
        $validated=$request->validate([
            'title' => 'required',

        ]);


        $expert=Expert::find($id);
        $expert->title=$request->title;

        if($request->image){
            $imgName=rand(100000,99999999);
            $request->image->storeAs('public/experts/images', $imgName.'.'.$request->image->extension());
            $expert->image='/storage/experts/images/'.$imgName.'.'.$request->file('image')->extension();
        }

        if($request->image1){
            $imgName=rand(100000,99999999);
            $request->image1->storeAs('public/experts/images', $imgName.'.'.$request->image1->extension());
            $expert->image1='/storage/experts/images/'.$imgName.'.'.$request->file('image1')->extension();
        }
        if($request->image2){
            $imgName=rand(100000,99999999);
            $request->image2->storeAs('public/experts/images', $imgName.'.'.$request->image2->extension());
            $expert->image2='/storage/experts/images/'.$imgName.'.'.$request->file('image2')->extension();
        }
        if($request->image3){
            $imgName=rand(100000,99999999);
            $request->image3->storeAs('public/experts/images', $imgName.'.'.$request->image3->extension());
            $expert->image3='/storage/experts/images/'.$imgName.'.'.$request->file('image3')->extension();
        }
        if($request->image4){
            $imgName=rand(100000,99999999);
            $request->image4->storeAs('public/experts/images', $imgName.'.'.$request->image4->extension());
            $expert->image4='/storage/experts/images/'.$imgName.'.'.$request->file('image4')->extension();
        }
        if($request->image5){
            $imgName=rand(100000,99999999);
            $request->image5->storeAs('public/experts/images', $imgName.'.'.$request->image5->extension());
            $expert->image5='/storage/experts/images/'.$imgName.'.'.$request->file('image5')->extension();
        }
        $expert->update();
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
