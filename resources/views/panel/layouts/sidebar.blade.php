
<div class="flex flex-col h-full border-l " >
    <div class="flex items-center justify-center h-16 " :class="menu ? 'bg-blue-600' : '' ">
        <div class="flex items-center w-full gap-8 px-3 py-5 " :class="menu ? 'justify-between' : 'justify-center' ">
            <div class="flex items-center gap-3"  x-show="menu">
                <img class="" src="{{ asset('assets/images/logo-white.png') }}" alt="">
                <h2 class="text-xl text-white">
                    نوسپار
                </h2>
                <span class="text-white/60">
                    نسخه آزمایشی
                </span>
            </div>
            <span @click="menu=!menu" class="p-2 rounded-md">
                <img class="" src="{{ asset('assets/images/panel-menu-toggle-close.png') }}" x-show="menu">
                <img class="" src="{{ asset('assets/images/panel-menu-toggle-open.png') }}" x-show="!menu">
                {{-- <i class="flex text-2xl fi fi-rr-menu-burger" x-show="menu"></i>
                <i class="flex text-2xl fi fi-rr-bars-sort" x-show="!menu"></i> --}}
            </span>

        </div>
    </div>

    <div class="flex flex-col justify-between h-full ">
        <div class="flex flex-col gap-8 mt-2" :class="menu ? 'p-3' : 'p-1' ">

            <div class="">
                <a href="{{route('panel.account.index')}}" class="flex flex-col items-center gap-2 rounded-md " :class="menu ? 'bg-slate-100 p-2' : 'p-1' ">
                    <img src="{{ asset(auth()->user()->profile_image) }}" alt="" class="h-14 w-14">
                    <div class="flex flex-col items-center gap-1">
                        <div class="text-xl font-bold" x-show="menu">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        </div>
                        <div class="text-xs font-bold" x-show="menu">
                             کد انحصاری : {{ auth()->user()->code }}
                        </div>
                    </div>
                </a>
            </div>
            <div class="">
                <ul class="flex flex-col gap-3 text-lg " :class="menu ? '' : 'items-center' ">
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
                        <a href="{{ route('panel.teams.index') }}" class="flex items-center gap-5 p-3 hover:bg-slate-100 rounded-md
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
                            <span x-show="menu">
                                تیم سازی
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('panel.challenge.index') }}" class="flex items-center gap-5 p-3 hover:bg-slate-100 rounded-md
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
                            <span x-show="menu">
                                چالش ها
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('site.index') }}" class="flex items-center gap-5 p-3  rounded-m text-slate-500" >
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
                        <a href="{{ route('site.index') }}" class="flex items-center gap-5 p-3  rounded-m text-slate-500" >
                        @if (request()->routeIs('panel.123'))
                            <img src="{{ asset('assets/images/panel-menu-mali.png') }}" alt="">
                        @else
                            <img src="{{ asset('assets/images/panel-menu-mali.png') }}" alt="">
                        @endif
                            <span x-show="menu">
                                حسابداری
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