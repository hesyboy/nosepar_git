<div>


    @include('panel.layouts.notification')



    <div class="flex flex-col gap-5" x-data="{'tab':'tab0'}">


        <div>
            <ul class="flex items-center gap-1">
                <li>
                    <a href="">
                        خانه
                    </a>
                </li>
                <li>
                    <span>
                        >
                    </span>
                </li>
                <li>
                    <a href="">
                        تیم ها
                    </a>
                </li>

            </ul>
        </div>

        <div class="bg-white rounded-md shadow " >
            <div class="flex items-start justify-between p-4">
                <div>
                    <div class="flex items-center gap-4 py-1">
                        <div>
                            <img src="{{ asset($team->profile_image) }}" alt="" class="w-20 h-20 rounded-full">
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-5">
                                <h2 class="text-xl font-iranyekan-bold">
                                    {{$team->name}}
                                </h2>
                                {{-- <h3 class="text-base ">
                                    {{$team->title}}
                                </h3> --}}
                            </div>
                            <div class="flex gap-1">
                                @foreach ($team->teamExperts as $teamExpert)


                                    <div x-data="{popup:false}" @mouseover="popup=true" @mouseleave="popup=false"
                                        class="relative flex items-center bg-white justify-center  text-xs text-white uppercase  rounded-full cursor-pointer h-10 w-10  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                        <img class="rounded-full" src="{{asset($teamExpert->expert->image)}}" alt="" >
                                        <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                            {{$teamExpert->expert->title}}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="my-3">
                        <div class="flex gap-5" :class="menu ? 'flex' : 'hidden' ">
                            @if ($team->kaggle)
                                <a href="{{ asset($team->kaggle) }}">
                                    <img src="http://127.0.0.1:8000/assets/images/telegram-blue.png" alt="" class="w-5 h-5">
                                </a>
                            @endif
                            @if ($team->linkedin)
                                <a href="{{ asset($team->linkedin) }}">
                                    <img src="http://127.0.0.1:8000/assets/images/linkdin-blue.png" alt="" class="w-5 h-5">
                                </a>
                            @endif
                            @if ($team->github)
                                <a href="{{ asset($team->github) }}">
                                    <img src="http://127.0.0.1:8000/assets/images/github-blue.png" alt="" class="w-5 h-5">
                                </a>
                            @endif


                        </div>
                    </div>
                    <div class="my-3">
                        <span class="text-base font-iranyekan-reqular">
                            {{$team->title}}

                        </span>
                    </div>
                </div>
                <div class="flex gap-3">
                    @if ($members->where('user_id','=',auth()->id())->first())
                        {{-- @if ($members->where('user_id','=',auth()->id())->first()->role == 0)
                        <a href="" class="px-4 py-2 text-base text-white bg-blue-600 rounded-md">
                            <span>
                                عضویت در تیم
                            </span>
                        </a>
                        @elseif ($members->where('user_id','=',auth()->id())->first()->role == 1)
                            <a  class="px-4 py-2 text-base text-white rounded-md bg-slate-800">
                                <span>
                                    حذف تیم
                                </span>
                            </a>
                        @endif --}}

                        <a wire:click="exitTeam()" class="flex gap-3 py-2 px-4 text-sm text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">
                            <span>
                                خروج از تیم
                            </span>
                        </a>

                    @else
                        <a wire:click="enterTeam()" class="flex gap-3 p-2 text-sm text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">
                            <img src="{{asset('assets/images/icons_add_user_male.svg')}}" alt="">
                            <span>
                                عضویت در تیم
                            </span>
                        </a>
                    @endif

                    {{-- <a wire:click="addMember()" class="flex gap-3 p-2 text-base text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">
                        <img src="{{asset('assets/images/icons_add_user_male.svg')}}" alt="">
                        <span>
                            عضویت در تیم
                        </span>
                    </a> --}}

                    <a href="" class="flex gap-3 p-2 text-base text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        <img src="{{asset('assets/images/icons_share.svg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="px-4 pt-2 text-base border-t font-iranyekan-bold">
                <div class="flex items-center gap-8">
                    <span @click="tab='tab0'" class="pt-2 pb-3 border-b-4 cursor-pointer " :class="tab=='tab0' ? ' border-blue-500' : ' border-white' " >
                        فعالیت ها
                    </span>
                    <span @click="tab='tab1'" class="pt-2 pb-3 border-b-4 cursor-pointer " :class="tab=='tab1' ? ' border-blue-500' : ' border-white' ">
                        اعضا
                    </span>
                    <span @click="tab='tab2'" class="pt-2 pb-3 border-b-4 cursor-pointer " :class="tab=='tab2' ? ' border-blue-500' : ' border-white' ">
                        چالش ها
                    </span>
                    <span @click="tab='tab3'" class="pt-2 pb-3 border-b-4 cursor-pointer " :class="tab=='tab3' ? ' border-blue-500' : ' border-white' ">
                        مدارک و دستاوردها
                    </span>
                </div>
            </div>
        </div>

        <div>
            <div class="flex flex-col gap-5" x-show="tab=='tab0'">
                <div class="flex flex-col gap-3 p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        اطلاعات کلی
                    </div>
                    <div>
                        {{$team->description}}
                    </div>
                </div>
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        نشان های کسب شده
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab1'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="mb-3 text-base font-iranyekan-bold">
                        اعضای تیم
                    </div>
                    <div class="flex gap-3 m-2">
                        @foreach ($members as $teamMember )
                            <a href="{{ route('panel.profile.show',$teamMember->user->code) }}" class="p-2 duration-200 bg-gray-100 border rounded-md cursor-pointer hover:bg-blue-600 hover:text-white">
                                <span>
                                    {{$teamMember->User->first_name}} {{$teamMember->User->last_name}}
                                </span>
                                <span>
                                    (مدیر تیم)
                                </span>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab2'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        چالش های فعال
                    </div>
                </div>
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        چالش های حل شده
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab3'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        مدارک و دستاوردها
                    </div>
                </div>
            </div>
        </div>









    </div>
</div>
