<?php

namespace App\Http\Livewire\Panel\Account;

use App\Models\Expert;
use App\Models\User;
use App\Models\UserExpert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;


class Index extends Component
{
    use WithFileUploads;


    public $user;

    public $first_name,$last_name,$job_title,$description;
    public $profile_image,$cover_image;

    public $email,$mobile,$password;

    public $github,$linkedin,$kaggle;

    public $experts,$expertSearch;
    public $selectedExperts=[];

    public function mount(){
        $this->user = Auth::user();

        $this->first_name=$this->user->first_name;
        $this->last_name=$this->user->last_name;
        $this->job_title=$this->user->title;
        $this->description=$this->user->description;

        $this->email=$this->user->email;
        $this->mobile=$this->user->mobile;
        // $this->password=$this->user->password;

        $this->github=$this->user->github;
        $this->linkedin=$this->user->linkedin;
        $this->kaggle=$this->user->kaggle;

        // $this->profile_image=$this->user->profile_image;
        // $this->cover_image=$this->user->cover_image;

        $this->experts=Expert::all();

        foreach(UserExpert::where('user_id',$this->user->id)->get() as $ii){
               array_push($this->selectedExperts,$ii->expert_id) ;
        };


    }


    public function addUserExpret($id){
        if(!in_array($id,$this->selectedExperts)){
            array_push($this->selectedExperts,$id);
        }
    }


    public function removeUserExpret($id){
        if(in_array($id,$this->selectedExperts)){
            unset($this->selectedExperts[array_search($id, $this->selectedExperts)]);
        }
    }

    public function updatedExpertSearch(){
        $this->experts=Expert::where('title','like','%'.$this->expertSearch.'%')->get();
    }




    protected function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'job_title' => ['required'],
            'description' => ['required'],


            'email' => ['required','email','unique:users,email,'.$this->user->id],
            'mobile' => ['required','unique:users,mobile,'.$this->user->id],
            'password' => ['required','min:8']

        ];
    }

    public function save1(){

        $this->validateOnly('first_name');
        $this->validateOnly('last_name');
        $this->validateOnly('job_title');
        $this->validateOnly('description');


        $this->user->first_name = $this->first_name ;
        $this->user->last_name = $this->last_name ;
        $this->user->title = $this->job_title ;
        $this->user->description = $this->description ;

        // if($this->cover_image){
        //     $imgName=rand(100000,99999999);
        //     $this->cover_image->storeAs('public/users/images', $imgName.'.'.$this->cover_image->extension());
        //     $this->user->cover_image='/storage/users/images/'.$imgName.'.'.$this->cover_image->extension();
        // }


        if($this->profile_image){
            $imgName=rand(100000,99999999);
            $this->profile_image->storeAs('public/teams/images', $imgName.'.'.$this->profile_image->extension());
            $this->user->profile_image='/storage/teams/images/'.$imgName.'.'.$this->profile_image->extension();
        }


        $this->user->update();

        return redirect()->route('panel.account.index')->with(['success' => ' ثبت و بروز رسانی اطلاعات کلی انجام شد']);

        // session()->flash('success', ' ثبت و بروز رسانی اطلاعات کلی انجام شد');
    }



    public function save2(){

        $this->validateOnly('email');
        $this->validateOnly('mobile');
        $this->validateOnly('password');

        $this->user->email = $this->email ;
        $this->user->mobile = $this->mobile ;
        $this->user->password = Hash::make($this->password) ;
        $this->user->update();

        return redirect()->route('panel.account.index')->with(['success' => ' ثبت و بروز رسانی اطلاعات کاربری انجام شد']);


        // session()->flash('success', ' ثبت و بروز رسانی اطلاعات کاربری انجام شد');
    }

    public function save3(){


        $this->user->github = $this->github ;
        $this->user->linkedin = $this->linkedin ;
        $this->user->kaggle = $this->kaggle ;
        $this->user->update();

        return redirect()->route('panel.account.index')->with(['success' => ' ثبت و بروز رسانی شبکه های اجتماعی  انجام شد ']);

        // session()->flash('success', ' ثبت و بروز رسانی شبکه های اجتماعی  انجام شد ');
    }


    public function save4(){

        // $mine=TeamExpert::where('team_id',$this->team->id)->delete;
        // dd($mine);
        foreach(UserExpert::where('user_id',$this->user->id)->get() as $ii){
            $ii->delete() ;
        };


        foreach($this->selectedExperts as $item){
            $expert=new UserExpert();
            $expert->user_id = $this->user->id;
            $expert->expert_id = $item;
            $expert->save();
        }

        // $this->team=$this->team;

        return redirect()->route('panel.account.index')->with(['success' => ' ثبت و بروز رسانی تخصص ها انجام شد ']);

        // session()->flash('success', ' ثبت و بروز رسانی تخصص ها انجام شد ');

    }

    public function delete(){
        $this->user->delete();
        return redirect()->route('site.index');
    }

    public function render()
    {
        return view('livewire.panel.account.index');
    }
}
