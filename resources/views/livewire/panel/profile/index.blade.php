<div>

    <div class="fixed left-0 flex items-start justify-center w-screen top-1">
        <div class="w-[500px]">
            @if (session('success'))
                <div class="" >
                    <div class="">
                        <div class="flex items-center justify-between gap-3 p-2 text-sm text-white border-b border-gray-200 rounded-lg bg-emerald-800">
                            <div class="flex items-center gap-3 ">
                                <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                                <div class="">
                                    {{session('success')}}
                                </div>
                            </div>
                            <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross" ></i>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('warning'))
            <div class="" >
                <div class="">
                    <div class="flex items-center justify-between gap-3 p-2 text-sm text-white bg-orange-600 border-b border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3 ">
                            <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                            <div class="">
                                {{session('warning')}}
                            </div>
                        </div>
                        <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross"></i>
                    </div>
                </div>
            </div>
            @endif
            @if (session('danger'))
            <div class="" >
                <div class="">
                    <div class="flex items-center justify-between gap-3 p-2 text-sm text-white bg-red-800 border-b border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3 ">
                            <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                            <div class="">
                                {{session('danger')}}
                            </div>
                        </div>
                        <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross" ></i>
                    </div>
                </div>
            </div>

            @endif

        </div>
    </div>


    <div class="flex flex-col gap-5" x-data="{'tab':'tab0'}">



        <div>
            <ul class="flex items-center gap-2 text-sm ">
                <li>
                    <a href="{{route('site.index')}}" class="text-slate-500 hover:text-slate-700 hover:font-bold">
                        خانه
                    </a>
                </li>
                <li>
                    <span>
                        >
                    </span>
                </li>
                <li>
                    <a href="{{route('panel.teams.index')}}" class="text-slate-500 hover:text-slate-700 hover:font-bold">
                        متخصص ها
                    </a>
                </li>
                <li>
                    <span>
                        >
                    </span>
                </li>
                <li>
                    <a href="" class="text-blue-600 font-bold">
                        متخصص {{$user->first_name}} {{$user->last_name}}
                    </a>
                </li>

            </ul>
        </div>

        <div class=" bg-white rounded-md shadow" >
            <div class="flex justify-between items-center p-4">
                <div class="flex flex-col gap-5">
                    <div class="flex gap-3">
                        <div>
                            <img src="{{ asset($user->profile_image) }}" alt="" class="w-24 h-24 rounded-md">
                        </div>
                        <div class="flex flex-col items-start gap-4">
                            <div class="flex gap-5 items-center">
                                <h2 class="font-iranyekan-bold text-xl">
                                    {{$user->first_name}} {{$user->last_name}}
                                </h2>
                                <h3 class=" text-base">
                                    {{$user->title}}
                                </h3>
                            </div>
                            <div class="flex gap-3">
                                @foreach ($user->userExperts as $userExpert)
                                    <div x-data="{popup:false}" @mouseover="popup=true" @mouseleave="popup=false"
                                        class="relative flex items-center bg-white justify-center  text-xs text-white uppercase  rounded-md overflow-hidden cursor-pointer h-11 w-11  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                        <img class="" src="{{asset($userExpert->expert->image)}}" alt="" >
                                        <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                            {{$userExpert->expert->title}}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div>

                        <div class="flex justify-start gap-5 px-2">
                            <a href="http://{{$user->kaggle}}">
                                <img src="{{asset('assets/images/telegram-blue.png')}}" alt="" class="w-7 h-7">
                            </a>
                            <a href="http://{{$user->linkedin}}">
                                <img src="{{asset('assets/images/linkdin-blue.png')}}" alt="" class="w-7 h-7">
                            </a>
                            <a href="http://{{$user->github}}">
                                <img src="{{asset('assets/images/github-blue.png')}}" alt="" class="w-7 h-7">
                            </a>
                        </div>
                    </div>
                    <div class="">
                        <span class="font-iranyekan-reqular">
                            {{ Str::limit($user->description, 60) }}
                        </span>
                    </div>
                </div>
                <div class="flex gap-3">


                    @if ($user->id != auth()->user()->id)

                            @if ($following==true)
                            <a wire:click="follow()" class="flex gap-3 px-6 py-2 text-xs text-white bg-emerald-600 rounded-md cursor-pointer font-iranyekan-regular hover:bg-emerald-700 ">
                                <img src="{{asset('assets/images/icons_add_user_male.svg')}}" alt="" class="w-5">
                                <span>
                                    پیوند زده شده
                                </span>
                            </a>
                        @elseif($following==false)
                            <a wire:click="follow()" class="flex gap-3 px-6 py-2 text-xs text-white bg-blue-600 rounded-md cursor-pointer font-iranyekan-regular hover:bg-blue-700">
                                <img src="{{asset('assets/images/icons_add_user_male.svg')}}" alt="" class="w-5">
                                <span>
                                    پیوند
                                </span>
                            </a>
                        @endif

                        <div x-data="{modal:false}" class="flex">
                            <a @click="modal=true" class="flex gap-3 px-6 py-2 text-xs text-white bg-blue-600 rounded-md cursor-pointer font-iranyekan-regular hover:bg-blue-700">
                                <img src="{{asset('assets/images/icons_add_user_male.svg')}}" alt="" class="w-5">
                                <span>
                                    دعوت به تیم
                                </span>
                            </a>

                            <div class="fixed top-0 left-0 flex items-center justify-center w-screen h-screen bg-black/60" x-show="modal"   x-cloak x-transition.opacity>
                                <div class="p-5 bg-white shadow rounded-md w-[550px]" @click.outside="modal=false">
                                    <div class="flex flex-col gap-3">
                                        <div class="font-bold text-base">
                                            دعوت به تیم
                                        </div>
                                        <div>
                                            تیمی که مدیریت آن را به عهده دارید انتخاب کنبد
                                        </div>
                                        <div>
                                            <select class="w-full p-3 rounded-md border border-gray-400 outline-blue-600 text-sm text-right">
                                                <option value="">انتخاب کنید</option>
                                            </select>
                                        </div>
                                        <div class="flex flex-row-reverse gap-3 items-center mt-3">
                                            <div class="px-6 py-3 font-iranyekan-regular text-blue-800 bg-blue-100 hover:bg-blue-200 rounded-md cursor-pointer" @click="modal=false">
                                                بیخیال
                                            </div>
                                            <div wire:click="save" class="px-6 py-3 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                                                دعوت به تیم
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif





                    {{-- <a href="" class="flex gap-3 p-2 text-base text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        <img src="{{asset('assets/images/icons_share.svg')}}" alt="" class="w-5">
                    </a> --}}


                </div>
            </div>
            <div class="px-4 pt-2 border-t font-iranyekan-bold text-base">
                <div class="flex gap-8 items-center">
                    <span @click="tab='tab0'" class=" pt-2 pb-3 border-b-4 cursor-pointer" :class="tab=='tab0' ? ' border-blue-500' : ' border-white' " >
                        فعالیت ها
                    </span>
                    <span @click="tab='tab1'" class=" pt-2 pb-3 border-b-4 cursor-pointer" :class="tab=='tab1' ? ' border-blue-500' : ' border-white' ">
                        تیم ها
                    </span>
                    <span @click="tab='tab2'" class=" pt-2 pb-3 border-b-4 cursor-pointer" :class="tab=='tab2' ? ' border-blue-500' : ' border-white' ">
                        چالش ها
                    </span>
                    <span @click="tab='tab3'" class=" pt-2 pb-3 border-b-4 cursor-pointer" :class="tab=='tab3' ? ' border-blue-500' : ' border-white' ">
                        مدارک
                    </span>
                    <span @click="tab='tab4'" class=" pt-2 pb-3 border-b-4 cursor-pointer" :class="tab=='tab4' ? ' border-blue-500' : ' border-white' ">
                        پیوندها
                    </span>
                </div>
            </div>
        </div>

        <div>
            <div class="flex flex-col gap-5" x-show="tab=='tab0'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="font-iranyekan-bold text-base">
                        اطلاعات کلی
                    </div>
                    <div class="my-3">
                        {{$user->description}}
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-5">
                    <div class="p-3 bg-white rounded-md shadow">
                        <div class="font-iranyekan-bold text-base">
                            نشان های کسب شده
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab1'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="font-iranyekan-bold text-base mb-3">
                        تیم های عضو شده
                    </div>
                    @php
                        $myTeamMembers=App\Models\TeamMember::where('user_id',auth()->user()->id)->get();
                    @endphp
                    <div class="flex gap-3 m-2">
                        @foreach ($myTeamMembers as $teamMember )
                            <a href="{{route('panel.teams.show',$teamMember->Team)}}" class="text-xs p-2 border rounded-md bg-gray-100 hover:bg-blue-600 hover:text-white duration-200 cursor-pointer">
                                <span>
                                    {{$teamMember->Team->name}}
                                </span>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab2'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="font-iranyekan-bold text-base">
                        چالش های فعال
                    </div>
                </div>
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="font-iranyekan-bold text-base">
                        چالش های حل شده
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab3'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="font-iranyekan-bold text-base">
                        مدارک و دستاوردها
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab4'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="font-iranyekan-bold text-base mb-3">
                        پیوندها
                    </div>
                    <div class="flex gap-3 m-2">
                        @foreach (App\Models\UserFollowing::where('user_id',$user->id)->get() as $follow )
                            <a href="{{route('panel.profile.show',$follow->following->code)}}" class="text-xs p-2 border rounded-md bg-gray-100 hover:bg-blue-600 hover:text-white duration-200 cursor-pointer">
                                <span>
                                    {{$follow->following->first_name}} {{$follow->following->last_name}}
                                </span>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>









    </div>
</div>
