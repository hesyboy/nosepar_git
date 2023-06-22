<div>

    <div class="fixed left-0 flex items-center justify-center top-1 z-50 p-2 w-[400px]">
        <div class="">
            @if (session('success'))
                <div class="" >
                    <div class=""  >
                        <div class="flex items-center justify-between gap-3 p-2 text-sm text-white border-b border-gray-200 rounded-lg bg-emerald-800">
                            <div class="flex items-center gap-3 ">
                                <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                                <div class="">
                                    {{session('success')}}
                                </div>
                            </div>
                            <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross"></i>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('warning'))
            <div class="" >
                <div class=""  >
                    <div class="flex items-center justify-between gap-3 p-2 text-sm text-white bg-orange-600 border-b border-gray-200 rounded-lg">
                        <div class="flex items-center gap-3 ">
                            <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                            <div class="">
                                {{session('warning')}}
                            </div>
                        </div>
                        <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross" ></i>
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


    <div class="flex flex-col gap-5">

        <div class="grid grid-cols-12 gap-5">

            <div class="col-span-12 md:col-span-8 bg-white rounded-md shadow relative h-[370px]">
                <div class="flex items-center justify-between p-3 border-b font-iranyekan-bold " x-data="{modal:false}">
                    <span class="text-lg ">
                        تیم های من
                    </span>
                    <div class="px-4 py-2 text-sm text-blue-800 bg-blue-100 rounded-md cursor-pointer hover:bg-blue-200" @click="modal=true">
                        <span>
                            ایجاد تیم جدید
                        </span>
                    </div>
                    <div class="fixed top-0 left-0 flex items-center justify-center w-screen h-screen bg-black/60 z-30" x-show="modal"  x-cloak x-transition.opacity>
                        <div class="p-5 bg-white shadow rounded-md mr-20 md:mr-0 w-[280px] md:w-[550px]" >
                            @livewire('panel.team-create-modal')
                        </div>
                    </div>
                </div>
                <div>
                    <table class="w-full bg-white rounded-md">
                        <thead class="w-full p-2">
                            <tr class="p-4 text-sm border-b font-iranyekan-bold">
                                <td class="p-5 w-28 md:w-72">
                                    نام تیم/شرکت
                                </td>
                                <td>
                                    نقش من
                                 </td>
                                <td>
                                   اعضا
                                </td>
                                <td>

                                </td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($myTeamsView as $myTeam)
                            <tr class="text-sm border-b font-iranyekan-bold hover:bg-slate-100">
                                <td class="px-3 py-2">
                                    <a href="{{ route('panel.teams.show',$myTeam->id) }}" class="flex items-center gap-5">
                                        <img src="{{ asset($myTeam->profile_image) }}" class="w-12 h-12 rounded-full" alt="">
                                        <span>
                                            {{$myTeam->name}}
                                        </span>
                                    </a>
                                </td>
                                <td class="px-3 py-2">
                                    {{-- <div class="flex items-center gap-5">
                                        @if($myTeam->teamMembers->where('user_id',auth()->id())->first()->role == 1  )
                                            <span class="text-blue-600">
                                                مدیر
                                            </span>
                                        @else
                                            <span>
                                                عضو
                                            </span>
                                        @endif

                                    </div> --}}
                                            <div class="flex items-center gap-5">


                                                @php
                                                    $myMember=App\models\TeamMember::where('team_id',$myTeam->id)->where('user_id',auth()->user()->id )->get()->first();
                                                    // dd($myMember);
                                                @endphp


                                                @if($myMember->team->owner_id == $myMember->user->id )
                                                    <span class="text-blue-600">
                                                        مدیر و ایجاد کننده تیم
                                                    </span>
                                                @elseif($myMember->status == 1)
                                                    @if($myMember->role == 1  )
                                                        <span class="text-blue-600">
                                                            مدیر تیم
                                                        </span>
                                                    @else
                                                        <span>
                                                            عضو تیم
                                                        </span>
                                                    @endif
                                                @else


                                                <span>
                                                    در انتظار تایید
                                                </span>
                                                @endif


                                            </div>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="flex">
                                        @foreach ($myTeam->teamMembers as $teamMember)
                                            {{-- <a href="{{ route('panel.profile.show',$teamMember->user->code) }}" class="flex items-center justify-center bg-white -mr-4 text-xs text-white uppercase  rounded-full cursor-pointer h-10 w-10  hover:z-50 overflow-hidden border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                                <img class="rounded-full" src="{{asset($teamMember->User->profile_image)}}" alt="">
                                            </a> --}}
                                            <a x-data="{popup:false}" href="{{ route('panel.profile.show',$teamMember->user->code) }}" @mouseover="popup=true" @mouseleave="popup=false"
                                                class="relative flex items-center bg-white justify-center -mr-4 text-xs text-white uppercase  rounded-full cursor-pointer h-10 w-10  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                                <img class="rounded-full" src="{{asset($teamMember->User->profile_image)}}" alt="" >
                                                <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                                    {{$teamMember->User->first_name}} {{$teamMember->User->last_name}}
                                                </span>
                                            </a>
                                        @endforeach
                                        {{-- <span class="-mr-2 bg-blue-400 rounded-full cursor-pointer h-7 w-7 hover:z-50"></span>
                                        <span class="-mr-2 bg-red-400 rounded-full cursor-pointer h-7 w-7 hover:z-50"></span>
                                        <span class="-mr-2 rounded-full cursor-pointer h-7 w-7 bg-emerald-400 hover:z-50"></span>
                                        <span class="-mr-2 bg-indigo-400 rounded-full cursor-pointer h-7 w-7 hover:z-50"></span>
                                        <span class="flex items-center justify-center -mr-2 text-xs text-black bg-gray-100 rounded-full cursor-pointer h-7 w-7 hover:z-50">+9</span> --}}

                                    </div>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="flex justify-end gap-3">
                                        @if($myTeam->teamMembers->where('user_id',auth()->id())->first()->role == 1 || $myTeam->owner_id == auth()->user()->id )
                                            <a href="{{route('panel.teams.manage',$myTeam)}}" class="px-6 py-2 text-xs text-white bg-blue-600 rounded-md cursor-pointer font-iranyekan-regular hover:bg-blue-700">
                                                <span>
                                                    مدیریت تیم
                                                </span>
                                            </a>
                                        @else
                                            <a href="{{ route('panel.teams.show',$myTeam->id) }}" class="px-6 py-2 text-xs text-white bg-gray-800 rounded-md cursor-pointer font-iranyekan-regular hover:bg-gray-900">
                                                <span>
                                                    مشاهده تیم
                                                </span>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                <div class="w-full flex justify-between items-center gap-1 mt-3 p-1 absolute bottom-0 right-0">
                    <div class="flex gap-1 p-2 text-xs font-bold">
                        <span>
                            نمایش
                        </span>
                        <span>
                            {{$myTeamsView->count()}}
                        </span>
                        <span>
                         از
                        </span>
                        <span>
                            {{$myTeams->count()}}
                        </span>
                        <span>
                            مورد
                        </span>
                    </div>
                    <div class="flex flex-row-reverse items-center gap-2 p-2">
                        @for ($i=0 ; $i<($myTeams->count())/3;$i++)
                            <span wire:click=pagination1({{$i+1}}) class="cursor-pointer flex items-center justify-center w-8 h-8  rounded-md
                            @if($page1==$i+1)
                                bg-blue-600 text-white
                            @else
                                bg-gray-100 text-black hover:bg-gray-200
                            @endif
                            ">
                                <span>
                                    {{$i+1}}
                                </span>
                            </span>
                        @endfor

                        <span  class=" flex items-center justify-center  animate-spin" wire:loading wire:target="pagination1">
                            <i class="fi fi-rr-spinner text-lg flex" ></i>
                        </span>


                    </div>

                </div>
            </div>

            <div class="col-span-12 md:col-span-4 bg-white rounded-md shadow h-[370px] relative">
                <div class="flex items-center p-4 border-b ">
                    <span class="font-iranyekan-bold text-lg ">
                        پیوندهای من
                    </span>
                </div>

                <div class="">
                    <ul class="text-sm  font-iranyekan-bold">
                        @foreach ($userFollowingsView as $i )
                            <li class="flex px-3 py-1 border-b">
                                <a href="{{route('panel.profile.show',$i->following->code)}}" class="flex py-1 items-center gap-5">
                                    <img src="{{ asset($i->following->profile_image) }}" class="w-12 rounded-full" alt="">
                                    <span>
                                         {{$i->following->first_name}} {{$i->following->last_name}}
                                    </span>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="absolute w-full flex justify-between items-center gap-1  p-1 bottom-0 right-0">
                    <div class="flex gap-1  p-2 text-xs font-bold">
                        <span>
                            نمایش
                        </span>
                        <span>
                            {{$userFollowingsView->count()}}
                        </span>
                        <span>
                         از
                        </span>
                        <span>
                            {{$userFollowings->count()}}
                        </span>
                        <span>
                            مورد
                        </span>
                    </div>
                    <div class="flex flex-row-reverse items-center gap-2 p-2">

                        @for ($i=0 ; $i<($userFollowings->count())/4;$i++)
                            <span wire:click=pagination2({{$i+1}}) class="cursor-pointer flex items-center justify-center w-8 h-8  rounded-md
                            @if($page2==$i+1)
                                bg-blue-600 text-white
                            @else
                                bg-gray-100 text-black hover:bg-gray-200
                            @endif
                            ">
                                <span>
                                    {{$i+1}}
                                </span>
                            </span>
                        @endfor
                        <span  class=" flex items-center justify-center  animate-spin" wire:loading wire:target="pagination2">
                            <i class="fi fi-rr-spinner text-lg flex " ></i>
                        </span>


                    </div>

                </div>
            </div>

        </div>


        <div>

            <div class="p-3 ">
                <div class="">
                    <div class="flex flex-col gap-3" x-data="{tab:0}">
                        <div class="flex flex-col md:flex-row justify-between text-black">
                            <div class="mb-5 text-lg text-black font-iranyekan-bold">
                               سایر متخصصین و تیم ها
                            </div>
                            <div class="flex flex-col md:flex-row gap-5 font-iranyekan-bold">
                                <label for="radio1" class="flex items-center gap-1" @click="tab=0">
                                    <input type="radio" id="radio1" name="radio-2" class="radio radio-primary" checked />
                                    <span class="text-sm">تیم ها و شرکت ها</span>
                                </label>
                                <label for="radio2" class="flex items-center gap-1" @click="tab=1">
                                    <input type="radio" id="radio2" name="radio-2" class="radio radio-primary" />
                                    <span class="text-sm">متخصصان هوش مصنوعی    </span>
                                </label>

                            </div>
                        </div>




                        <div x-show="tab==0" class="flex flex-col gap-5">
                            <div>
                                <div class="grid grid-cols-12 gap-5">
                                    <form action="" class="col-span-12 md:col-span-8">
                                        <div class="flex items-center justify-between p-2 text-sm bg-white rounded-md shadow font-iranyekan-light">
                                            <input wire:model="search_team" class="w-full p-3 outline-none" type="text" placeholder="جستجو کنید...">
                                            <button>
                                                <i class="flex p-3 text-xl fi fi-rr-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <form action="" class="col-span-12 md:col-span-4">
                                        <div class="flex items-center justify-between p-2 text-sm bg-white rounded-md shadow font-iranyekan-light">
                                            <input class="w-full p-3 outline-none" type="text" placeholder="جستجو بر اساس تخصص">
                                            <button>
                                                <i class="flex p-3 text-xl fi fi-rr-filter"></i>
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <table class="w-full bg-white rounded-md shadow">
                                    <thead class="w-full p-2">
                                        <tr class="p-4 text-sm border-b font-iranyekan-bold">
                                            <td class="p-5 w-28 md:w-72">
                                                نام تیم/شرکت
                                            </td>
                                            <td>
                                               اعضا
                                            </td>
                                            <td>
                                                تخصص ها
                                             </td>
                                            <td>

                                            </td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($allTeams as $myTeam)
                                        <tr class="text-sm border-t-2 border-gray-100 font-iranyekan-bold hover:bg-slate-100">
                                            <td class="px-3 py-3">
                                                <a href="{{ route('panel.teams.show',$myTeam->id) }}" class="flex items-center gap-5">
                                                    <img src="{{ asset($myTeam->profile_image) }}" class="w-12 h-12 rounded-full" alt="">
                                                    <span>
                                                        {{$myTeam->name}}
                                                    </span>
                                                </a>
                                            </td>

                                            <td class="px-3 py-3">
                                                <div class="flex">
                                                    @foreach ($myTeam->teamMembers as $teamMember)
                                                        <a x-data="{popup:false}" href="{{ route('panel.profile.show',$teamMember->user->code) }}" @mouseover="popup=true" @mouseleave="popup=false"
                                                            class="relative flex items-center bg-white justify-center -mr-4 text-xs text-white uppercase  rounded-full cursor-pointer h-10 w-10  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                                            <img class="rounded-full" src="{{asset($teamMember->User->profile_image)}}" alt="" >
                                                            <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                                                {{$teamMember->User->first_name}} {{$teamMember->User->last_name}}
                                                            </span>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </td>

                                            <td class="px-3 py-3">
                                                <div class="flex">
                                                    @foreach ($myTeam->teamExperts as $teamExpert)
                                                        <div x-data="{popup:false}" @mouseover="popup=true" @mouseleave="popup=false"
                                                            class="relative flex items-center bg-white justify-center -mr-4 text-xs text-white uppercase  rounded-full cursor-pointer h-10 w-10  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                                            <img class="rounded-full" src="{{asset($teamExpert->expert->image)}}" alt="" >
                                                            <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                                                {{$teamExpert->expert->title}}
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>

                                            <td class="px-3 py-3">
                                                <div class="flex flex-col md:flex-row justify-end gap-3 font-iranyekan-regular ">
                                                    <a href="{{route('panel.teams.show',$myTeam->id)}}"
                                                         class="w-28 flex justify-center  gap-3 px-4 py-2 text-xs text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">
                                                        <span>
                                                            مشاهده تیم
                                                        </span>
                                                    </a>
                                                    {{-- @if ($myTeam->teamMembers->where('user_id','=',auth()->id())->first())

                                                    <a wire:click="exitTeam({{$myTeam->id}})" class="flex gap-3 px-4 py-2 text-xs text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">
                                                        <span>
                                                            خروج از تیم
                                                        </span>
                                                        <span  class=" flex items-center justify-center  animate-spin" wire:loading wire:target="exitTeam">
                                                            <i class="fi fi-rr-spinner text-lg flex " ></i>
                                                        </span>

                                                    </a>

                                                @else
                                                    <a wire:click="enterTeam({{$myTeam->id}})" class="flex gap-3 px-4 py-2 text-xs text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">
                                                        <span>
                                                            عضویت در تیم
                                                        </span>
                                                    </a>
                                                @endif --}}

                                                <div class="">
                                                    @if ($myTeam->teamMembers->where('user_id','=',auth()->id())->first())
                                                        <div class="flex gap-3 items-center">
                                                            <a  class="w-28 flex justify-center gap-3 px-4 py-2 text-xs text-white bg-red-800 rounded-md cursor-pointer hover:bg-red-900">
                                                                <span wire:click="exitTeam({{$myTeam->id}})">
                                                                    خروج از تیم
                                                                </span>
                                                            </a>
                                                            {{-- <div  x-show="selected" x-cloak class="flex">
                                                                <span  class=" flex items-center justify-center  animate-spin" >
                                                                    <i class="fi fi-rr-spinner text-base flex " ></i>
                                                                </span>
                                                            </div> --}}
                                                        </div>
                                                    @else
                                                        <a wire:click="enterTeam({{$myTeam->id}})"
                                                            class="w-28 flex justify-center gap-3 px-4 py-2 text-xs text-white bg-green-800 rounded-md cursor-pointer hover:bg-green-900">
                                                            <span>
                                                                عضویت در تیم
                                                            </span>
                                                        </a>
                                                    @endif
                                                </div>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>



                        <div x-show="tab==1" class="flex flex-col gap-4">
                            <div>
                                <div class="grid grid-cols-12 gap-5">
                                    <form action="" class="col-span-8">

                                        <div class="flex items-center justify-between p-2 text-sm bg-white rounded-md shadow font-iranyekan-light">
                                            <input wire:model="search_user" class="w-full p-3 outline-none" type="text" placeholder="جستجو کنید...">
                                            <button>
                                                <i class="flex p-3 text-xl fi fi-rr-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <form action="" class="col-span-4">
                                        <div class="flex items-center justify-between p-2 text-sm bg-white rounded-md shadow font-iranyekan-light">
                                            <input class="w-full p-3 outline-none" type="text" placeholder="جستجو بر اساس تخصص">
                                            <button>
                                                <i class="flex p-3 text-xl fi fi-rr-filter"></i>
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <table class="w-full bg-white rounded-md shadow">
                                    <thead class="w-full p-2">
                                        <tr class="text-sm font-iranyekan-bold">
                                            <td class="p-5 w-24 md:w-72">
                                                نام متخصص
                                            </td>
                                            <td class="p-5">
                                               تیم ها
                                            </td>
                                            <td class="p-5">
                                                تخصص ها
                                             </td>
                                            <td class="p-5">

                                            </td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($allUsers as $i)
                                        <tr class="text-sm border-t-2 border-gray-100 font-iranyekan-bold">
                                            <td class="px-3 py-3">
                                                <a href="{{route('panel.profile.show',$i->code)}}" class="flex items-center gap-3">
                                                    <img src="{{ asset( $i->profile_image) }}" class="w-12 h-12 rounded-full" alt="">
                                                    <span>
                                                       {{ $i->first_name}} {{ $i->last_name}}
                                                    </span>
                                                </a>
                                            </td>
                                            {{-- <td class="p-3">
                                                <div>
                                                    <span>
                                                        {{ $i->teams}}
                                                    </span>
                                                </div>
                                            </td> --}}


                                            <td class="px-3 py-3">
                                                <div class="flex">
                                                    @foreach ($i->userTeamMembers as $teamMember)
                                                        <div x-data="{popup:false}" @mouseover="popup=true" @mouseleave="popup=false"
                                                            class="relative flex items-center bg-white justify-center -mr-4 text-xs text-white uppercase  rounded-full cursor-pointer h-10 w-10  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                                            <img class="rounded-full" src="{{asset($teamMember->Team->profile_image)}}" alt="" >
                                                            <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                                                {{$teamMember->Team->title}}
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>

                                            <td class="px-3 py-3">
                                                <div class="flex">
                                                    @foreach ($i->userExperts as $userExpert)
                                                        <div x-data="{popup:false}" @mouseover="popup=true" @mouseleave="popup=false"
                                                            class="relative flex items-center bg-white justify-center -mr-4 text-xs text-white uppercase  rounded-full cursor-pointer h-10 w-10  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                                            <img class="rounded-full" src="{{asset($userExpert->expert->image)}}" alt="" >
                                                            <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                                                {{$userExpert->expert->title}}
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="px-3 py-3">
                                                <div class="flex flex-col md:flex-row justify-end gap-3 font-iranyekan-regular items-center ">
                                                    <a href="{{route('panel.profile.show',$i->code)}}"
                                                        class="w-32 flex justify-center  gap-3 px-4 py-2 text-xs text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">
                                                        <span>
                                                            مشاهده پروفایل
                                                        </span>
                                                    </a>
                                                    {{-- <a wire:click="" class="flex gap-3 px-4 py-2 text-xs text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">
                                                        <span>
                                                            پیوند
                                                        </span>
                                                    </a> --}}
                                                    @php
                                                        $following = App\Models\UserFollowing::where('user_id',auth()->user()->id)->where('following_id',$i->id)->get()->first()
                                                    @endphp
                                                    @if ($following==true)
                                                        <a wire:click="follow({{$i->id}})"
                                                        class="w-28 flex justify-center  gap-3 px-4 py-2 text-xs text-white bg-red-800 rounded-md cursor-pointer hover:bg-red-900">
                                                            {{-- <img class="w-4" src="{{asset('assets/images/icons_add_user_male.svg')}}" alt=""> --}}
                                                            <span>
                                                                قطع ارتباط
                                                            </span>
                                                        </a>
                                                    @elseif($following==false)
                                                        <a wire:click="follow({{$i->id}})"
                                                        class="w-28 flex justify-center  gap-3 px-4 py-2 text-xs text-white bg-green-800 rounded-md cursor-pointer hover:bg-green-900">
                                                            {{-- <img class="w-4" src="{{asset('assets/images/icons_add_user_male.svg')}}" alt=""> --}}
                                                            <span>
                                                                پیوند جدید
                                                            </span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="flex justify-center mt-5">
                                    <a class="p-4 text-blue-500 bg-blue-100 rounded-md hover:text-white hover:bg-blue-600" href="">
                                        <i class="flex text-xl fi fi-rr-angle-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>

        </div>





    </div>
</div>
