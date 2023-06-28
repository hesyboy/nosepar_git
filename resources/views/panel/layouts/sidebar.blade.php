
<div class="flex flex-col h-full border-l "  >
    <div class="flex items-center justify-center pt-3 pb-6 " :class="menu ? 'bg-blue-600' : '' " >
        <div class="relative flex items-center w-full gap-8 px-3 py-5 " :class="menu ? 'justify-between' : 'justify-center' ">
            <div class="w-full flex flex-col items-center gap-3"  x-show="menu" x-cloak>
                <div class="w-full flex items-center justify-center">
                    <img class="w-32" src="{{ asset('assets/images/logo-new.svg') }}" alt="">
                </div>
                <div class="flex gap-3 items-center">
                    <h2 class="text-xl text-white">
                        نوسپار
                    </h2>
                    <span class="text-white/60">
                        نسخه آزمایشی
                    </span>
                </div>
            </div>
            <span  class=" p-2 rounded-md z-50" @click="menu=!menu" >
                <img class="" src="{{ asset('assets/images/panel-menu-toggle-close.png') }}" x-show="menu" x-cloak >
                <img class="" src="{{ asset('assets/images/panel-menu-toggle-open.png') }}" x-show="!menu" x-cloak >
                {{-- <i class="flex text-2xl fi fi-rr-menu-burger" x-show="menu"></i>
                <i class="flex text-2xl fi fi-rr-bars-sort" x-show="!menu"></i> --}}
            </span>

        </div>
    </div>

    <div class="flex flex-col justify-between h-full " @mouseover="menu=true" @mouseover.away="menu=false">
        <div class="flex flex-col gap-3 mt-2" :class="menu ? 'p-3' : 'p-1' ">

            <div class="">
                <a href="{{route('panel.account.index')}}" class="flex flex-col items-center gap-2 rounded-md w-full" :class="menu ? 'bg-slate-100 py-3 px-2 -mt-10' : 'p-1' ">
                    <img src="{{ asset(auth()->user()->profile_image) }}" alt="" class="h-14 w-14">
                    <div class="flex flex-col items-center gap-1">
                        <div class="text-xl font-bold" x-show="menu" x-cloak>
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        </div>
                        <div class="grid items-center grid-cols-3 gap-3 py-1 w-max"  x-show="menu" x-cloak>
                            @foreach (auth()->user()->userExperts as $userExpert)
                                <div x-data="{popup:false}" @mouseover="popup=true" @mouseleave="popup=false"
                                    class="relative flex items-center bg-white justify-center  text-xs text-white uppercase  rounded-full cursor-pointer h-10 w-10  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                    <img class="rounded-full" src="{{asset($userExpert->expert->image)}}" alt="" >
                                    <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                        {{$userExpert->expert->title}}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-xs font-bold" x-show="menu" x-cloak>
                             کد انحصاری : {{ auth()->user()->code }}
                        </div>
                    </div>
                </a>
            </div>
            <div class="">
                <ul class="flex flex-col gap-2 text-base " :class="menu ? '' : 'items-center' ">
                    {{-- <li>
                        <a href="{{ route('panel.index') }}" class="flex items-center gap-5 p-3 hover:bg-slate-100 rounded-md
                        @if (request()->routeIs('panel.index'))
                            text-blue-600  font-iranyekan-bold
                        @else
                            text-black
                        @endif
                         " >
                        @if (request()->routeIs('panel.index'))
                            <img src="{{ asset('assets/images/panel-menu-home2.png') }}" alt="">
                        @else
                            <img src="{{ asset('assets/images/panel-menu-home.png') }}" alt="">
                        @endif
                            <span x-show="menu">
                                خانه
                            </span>
                        </a>
                    </li> --}}

                    <li>
                        <a href="{{ route('panel.teams.index') }}" class="flex items-center gap-5 p-2 hover:bg-slate-100 rounded-md
                        @if (request()->routeIs('panel.teams.*'))
                            text-blue-600  font-iranyekan-bold
                        @else
                            text-black
                        @endif
                         " >
                        @if (request()->routeIs('panel.teams.*'))
                            <img src="{{ asset('assets/images/panel-menu-teams2.png') }}" alt="">
                        @else
                            <img src="{{ asset('assets/images/panel-menu-teams.png') }}" alt="">
                        @endif
                            <span x-show="menu" x-cloak>
                                تیم سازی
                            </span>
                        </a>
                    </li>

                    <li >
                        <a href="{{ route('panel.challenge.index') }}" class="flex items-center gap-5 p-2 hover:bg-slate-100 rounded-md
                        @if (request()->routeIs('panel.challenge.*'))
                            text-blue-600  font-iranyekan-bold
                        @else
                            text-black
                        @endif
                         " >
                        @if (request()->routeIs('panel.challenge.*'))
                            <img src="{{ asset('assets/images/panel-menu-chalesh2.png') }}" alt="">
                        @else
                            <img src="{{ asset('assets/images/panel-menu-chalesh.png') }}" alt="">
                        @endif
                            <span x-show="menu" x-cloak>
                                چالش ها
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('site.index') }}" class="flex items-center gap-5 p-2  rounded-m text-slate-500" >
                        @if (request()->routeIs('panel.123'))
                            <img src="{{ asset('assets/images/panel-menu-academy.png') }}" alt="">
                        @else
                            <img src="{{ asset('assets/images/panel-menu-academy.png') }}" alt="">
                        @endif
                            <span x-show="menu">
                                آکادمی
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('site.index') }}" class="flex items-center gap-5 p-2  rounded-m text-slate-500" >
                        @if (request()->routeIs('panel.123'))
                            <img src="{{ asset('assets/images/panel-menu-mali.png') }}" alt="">
                        @else
                            <img src="{{ asset('assets/images/panel-menu-mali.png') }}" alt="">
                        @endif
                            <span x-show="menu" x-cloak>
                                حسابداری
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('site.about-us') }}" class="flex items-center gap-5 p-2  rounded-m text-black" >
                        @if (request()->routeIs('panel.123'))
                            <img src="{{ asset('assets/images/panel-menu-academy.png') }}" alt="">
                        @else
                            <img src="{{ asset('assets/images/icons_info 1.svg') }}" alt="">
                        @endif
                            <span x-show="menu">
                                درباره ما
                            </span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('site.contact-us') }}" class="flex items-center gap-5 p-2  rounded-m text-black" >
                        @if (request()->routeIs('panel.123'))
                            <img src="{{ asset('assets/images/panel-menu-academy.png') }}" alt="">
                        @else
                            <img src="{{ asset('assets/images/icons_phone11.svg') }}" alt="">
                        @endif
                            <span x-show="menu">
                                تماس با ما
                            </span>
                        </a>
                    </li>

                    {{-- <li x-data="{'menudropdown':false}"  :class="[menudropdown ? 'bg-slate-100 rounded-md' : '',menu ? '' : 'relative' ] "
                    @mouseover="menudropdown=true" @mouseover.away="menudropdown=false" >
                        <a class="flex items-center gap-5 p-3 rounded-md cursor-pointer hover:bg-slate-200" >
                            <i class="flex text-2xl fi fi-rr-users-alt"></i>
                            <span x-show="menu">
                                تیم ها
                            </span>
                        </a>
                        <div class="px-4 py-2" x-show="menudropdown && menu" x-transition.duration.100ms :class="menu ? '' : 'absolute right-16 top-0 w-[200px] bg-white shadow-md rounded-md' ">
                            <ul>
                                <li>
                                    <a href="{{ route('panel.teams.index') }}" class="flex items-center gap-3 p-2 text-sm rounded-md hover:bg-slate-200" >
                                        <i class="flex text-2xl fi fi-rr-bullet"></i>
                                        <span >
                                            تیم های من
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('panel.teams.create') }}" class="flex items-center gap-3 p-2 text-sm rounded-md hover:bg-slate-200" >
                                        <i class="flex text-2xl fi fi-rr-bullet"></i>
                                        <span >
                                            ایجاد تیم جدید
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                    {{-- <li x-data="{'menudropdown':false}"  :class="[menudropdown ? 'bg-slate-100 rounded-md' : '',menu ? '' : 'relative' ] "
                    @mouseover="menudropdown=true" @mouseover.away="menudropdown=false" >
                        <a class="flex items-center gap-5 p-3 rounded-md cursor-pointer hover:bg-slate-200" >
                            <i class="flex text-2xl fi fi-rr-user-pen"></i>
                            <span x-show="menu">
                                حساب کاربری
                            </span>
                        </a>
                        <div class="px-4 py-2" x-show="menudropdown && menu" x-transition.duration.100ms :class="menu ? '' : 'absolute right-16 top-0 w-[200px] bg-white shadow-md rounded-md' ">
                            <ul>
                                <li>
                                    <a href="{{ route('panel.profile.index') }}" class="flex items-center gap-3 p-2 text-sm rounded-md hover:bg-slate-200" >
                                        <i class="flex text-2xl fi fi-rr-bullet"></i>
                                        <span >
                                            پروفایل
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('panel.account.index') }}" class="flex items-center gap-3 p-2 text-sm rounded-md hover:bg-slate-200" >
                                        <i class="flex text-2xl fi fi-rr-bullet"></i>
                                        <span >
                                            تنظیمات حساب
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ route('site.index') }}" class="flex items-center gap-5 p-3 rounded-md hover:bg-slate-200">
                            <i class="flex text-2xl fi fi-rr-lock"></i>
                            <span x-show="menu">
                                تغییر رمز عبور
                            </span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="flex items-center gap-5 p-3 rounded-md hover:bg-slate-200">
                                <i class="flex text-2xl fi fi-rr-exit"></i>
                                <span x-show="menu">
                                    خروج از حساب
                                </span>
                            </button>
                        </form>
                    </li> --}}
                </ul>
            </div>


        </div>
        <div class="flex flex-row-reverse justify-center gap-5 py-8" :class="menu ? 'flex' : 'hidden' ">
            <a>
                <img src="{{asset('assets/images/telegram-blue.png')}}" alt="" class="w-5 h-5">
            </a>
            <a>
                <img src="{{asset('assets/images/linkdin-blue.png')}}" alt="" class="w-5 h-5">
            </a>
            <a>
                <img src="{{asset('assets/images/github-blue.png')}}" alt="" class="w-5 h-5">
            </a>
        </div>
    </div>


</div>
