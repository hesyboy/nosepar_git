
<div class="border-l px-2 bg-slate-900 text-white h-screen">
    <div class="h-20 flex items-center justify-center bg-slate-900 ">
        <div class="w-full flex items-center justify-between gap-8 py-5 px-3">
            <span @click="menu=!menu" class="p-2  rounded-md">
                <i class="fi fi-rr-menu-burger flex text-2xl" x-show="menu"></i>
                <i class="fi fi-rr-bars-sort flex text-2xl" x-show="!menu"></i>
            </span>
            <h2 class="font-bold text-3xl text-white">
                No Separ
            </h2>
        </div>
    </div>
    <div class="p-2 bg-slate-900">
        <ul class="flex flex-col gap-3 text-base">
            <li>
                <a href="{{ route('admin.index') }}" class="flex items-center gap-5 p-3 text-white hover:bg-slate-800 rounded-md">
                    <i class="flex text-2xl fi fi-rr-dashboard"></i>
                    <span x-show="menu">داشبورد مدیریت</span>
                </a>
            </li>

            <li x-data="{'menudropdown':false}"  :class="[menudropdown ? 'bg-slate-800 rounded-md' : '',menu ? '' : 'relative' ] ">
                <a @click="menudropdown=!menudropdown" class="flex items-center gap-5 p-3 rounded-md hover:bg-slate-800 cursor-pointer" >
                    <i class="flex text-2xl fi fi-rr-user"></i>
                    <span x-show="menu">
                        مدیریت کاربران
                    </span>
                </a>
                <div class="px-4 py-2" x-show="menudropdown" :class="menu ? '' : 'absolute right-16 top-0 w-[200px] bg-slate-900 shadow-md rounded-md' ">
                    <ul>
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="flex text-sm items-center gap-3 p-2 rounded-md hover:bg-slate-900" >
                                <i class="flex text-2xl fi fi-rr-bullet"></i>
                                <span >
                                    لیست کاربران
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li x-data="{'menudropdown':false}"  :class="[menudropdown ? 'bg-slate-800 rounded-md' : '',menu ? '' : 'relative' ] ">
                <a @click="menudropdown=!menudropdown" class="flex items-center gap-5 p-3 rounded-md hover:bg-slate-800 cursor-pointer" >
                    <i class="flex text-2xl fi fi-rr-users-alt"></i>
                    <span x-show="menu">
                        مدیریت تیم ها
                    </span>
                </a>
                <div class="px-4 py-2" x-show="menudropdown" :class="menu ? '' : 'absolute right-16 top-0 w-[200px] bg-slate-900 shadow-md rounded-md' ">
                    <ul>
                        <li>
                            <a href="{{ route('admin.teams.index') }}" class="flex text-sm items-center gap-3 p-2 rounded-md hover:bg-slate-900" >
                                <i class="flex text-2xl fi fi-rr-bullet"></i>
                                <span >
                                    لیست تیم ها
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


            <li x-data="{'menudropdown':false}"  :class="[menudropdown ? 'bg-slate-800 rounded-md' : '',menu ? '' : 'relative' ] ">
                <a @click="menudropdown=!menudropdown" class="flex items-center gap-5 p-3 rounded-md hover:bg-slate-800 cursor-pointer" >
                    <i class="flex text-2xl fi fi-rr-bolt"></i>
                    <span x-show="menu">
                        مدیریت تخصص ها
                    </span>
                </a>
                <div class="px-4 py-2" x-show="menudropdown" :class="menu ? '' : 'absolute right-16 top-0 w-[200px] bg-slate-900 shadow-md rounded-md' ">
                    <ul>
                        <li>
                            <a href="{{ route('admin.experts.index') }}" class="flex text-sm items-center gap-3 p-2 rounded-md hover:bg-slate-900" >
                                <i class="flex text-2xl fi fi-rr-bullet"></i>
                                <span >
                                    لیست تخصص ها
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.experts.users.index') }}" class="flex text-sm items-center gap-3 p-2 rounded-md hover:bg-slate-900" >
                                <i class="flex text-2xl fi fi-rr-bullet"></i>
                                <span >
                                    لیست تخصص های کاربران
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.experts.teams.index') }}" class="flex text-sm items-center gap-3 p-2 rounded-md hover:bg-slate-900" >
                                <i class="flex text-2xl fi fi-rr-bullet"></i>
                                <span >
                                    لیست تخصص های تیم ها
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li x-data="{'menudropdown':false}"  :class="[menudropdown ? 'bg-slate-800 rounded-md' : '',menu ? '' : 'relative' ] ">
                <a @click="menudropdown=!menudropdown" class="flex items-center gap-5 p-3 rounded-md hover:bg-slate-800 cursor-pointer" >
                    <i class="flex text-2xl fi fi-rr-megaphone"></i>
                    <span x-show="menu">
                        مدیریت چالش ها
                    </span>
                </a>
                <div class="px-4 py-2" x-show="menudropdown" :class="menu ? '' : 'absolute right-16 top-0 w-[200px] bg-slate-900 shadow-md rounded-md' ">
                    <ul>
                        <li>
                            <a href="{{ route('admin.challenge.index')}}" class="flex text-sm items-center gap-3 p-2 rounded-md hover:bg-slate-900" >
                                <i class="flex text-2xl fi fi-rr-bullet"></i>
                                <span >
                                    لیست چالش ها
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li x-data="{'menudropdown':false}"  :class="[menudropdown ? 'bg-slate-800 rounded-md' : '',menu ? '' : 'relative' ] ">
                <a @click="menudropdown=!menudropdown" class="flex items-center gap-5 p-3 rounded-md hover:bg-slate-800 cursor-pointer" >
                    <i class="flex text-2xl fi fi-rr-envelope"></i>
                    <span x-show="menu">
                        مدیریت پیام ها
                    </span>
                </a>
                <div class="px-4 py-2" x-show="menudropdown" :class="menu ? '' : 'absolute right-16 top-0 w-[200px] bg-slate-900 shadow-md rounded-md' ">
                    <ul>
                        <li>
                            <a href="{{ route('admin.notifications.index') }}" class="flex text-sm items-center gap-3 p-2 rounded-md hover:bg-slate-900" >
                                <i class="flex text-2xl fi fi-rr-bullet"></i>
                                <span >
                                    لیست پیام ها
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.teams.index') }}" class="flex text-sm items-center gap-3 p-2 rounded-md hover:bg-slate-900" >
                                <i class="flex text-2xl fi fi-rr-bullet"></i>
                                <span >
                                    تنظیمات پیام ها
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>



            <li>
                <form action="{{ route('logout') }}" method="post" class="w-full">
                    @csrf
                    <button class="flex items-center gap-5 p-3 rounded-md hover:bg-slate-800 w-full">
                        <i class="flex text-2xl fi fi-rr-exit"></i>
                        <span x-show="menu">
                            خروج از حساب
                        </span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
