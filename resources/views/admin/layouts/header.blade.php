<div class="bg-white h-16 px-5 flex items-center justify-between w-full">



    <div class="w-full flex justify-between items-start md:items-center py-2">

        <div class="hidden md:flex items-center gap-5">


            <div class="font-bold text-xl">
                پنل مدیریت سایت
            </div>
            {{-- <div class="flex items-center gap-1 bg-indigo-900 text-white p-2 rounded-md text-slate-800">
                <span class="text-sm">کد کاربری : </span>
                <span class="text-sm">
                    {{ auth()->user()->code }}
                </span>
            </div>

            <div class="">
                <form action="">
                    <div class="bg-white py-1 px-3 rounded-lg flex items-center justify-between border-[2px]  border-slate-800">
                        <input type="text" class=" text-sm p-1 bg-white outline-none w-[400px] " placeholder="جستجو">
                        <button type="submit" class="bg-white text-black rounded-md">
                            <i class="fi fi-rr-search text-xl flex"></i>
                        </button>
                    </div>
                </form>
            </div> --}}

            {{-- <div class="px-2">
                <div class="font-bold text-xl">
                    پنل کاربری
                </div>
            </div>

            <div>
                <div class="form-control" dir="ltr">
                    <div class="input-group">
                      <input type="text" placeholder="Search…" class="input input-md input-bordered" />
                      <button class="btn btn-square">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                      </button>
                    </div>
                  </div>
            </div> --}}

        </div>
        <div class="flex gap-3 items-center px-2">





            {{-- <div class="relative" x-data="{'toggle':false}" @click.away="toggle=false">
                <a @click="toggle=!toggle" class="flex items-center gap-1 cursor-pointer  hover:bg-indigo-900 hover:text-white p-3 rounded-md text-slate-800">
                    <i class="fi fi-rr-envelope text-2xl flex"></i>
                </a>
                <div x-show="toggle" class="absolute top-14 left-0 w-60 bg-slate-200 p-2 rounded-md mt-1">
                    <ul class="flex flex-col gap-2">
                        <li >
                            <div class="bg-white p-2 rounded-md flex flex-col gap-2">
                                <div>
                                    متن پیام تا 30 کارکتر ...
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-xs">فرستنده</span>
                                    <span class="text-xs">3/16/2203</span>
                                </div>
                            </div>
                        </li>
                        <li >
                            <div class="bg-white p-2 rounded-md flex flex-col gap-2">
                                <div>
                                    متن پیام تا 30 کارکتر ...
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-xs">3/16/2203</span>
                                    <span class="text-xs">3/16/2203</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> --}}


{{--
            <div class="relative" x-data="{'toggle':false}" @click.away="toggle=false">
                <a @click="toggle=!toggle" class="flex items-center gap-1 cursor-pointer  hover:bg-indigo-900 hover:text-white p-3 rounded-md text-slate-800">
                    <i class="fi fi-rr-bell-ring text-2xl flex"></i>
                </a>
                <div x-show="toggle" class="absolute top-14 left-0 w-60 bg-slate-200 p-2 rounded-md mt-1">
                    <ul class="flex flex-col gap-2">
                        <li >
                            <div class="bg-white p-2 rounded-md flex flex-col gap-2">
                                <div>
                                    متن پیام تا 30 کارکتر ...
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-xs">فرستنده</span>
                                    <span class="text-xs">3/16/2203</span>
                                </div>
                            </div>
                        </li>
                        <li >
                            <div class="bg-white p-2 rounded-md flex flex-col gap-2">
                                <div>
                                    متن پیام تا 30 کارکتر ...
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-xs">3/16/2203</span>
                                    <span class="text-xs">3/16/2203</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> --}}



            <div class="relative" x-data="{'toggle':false}" @click.away="toggle=false">
                <a @click="toggle=!toggle" class="flex items-center gap-1 cursor-pointer  hover:bg-indigo-900 hover:text-white p-3 rounded-md text-slate-800">
                    <i class="fi fi-rr-user text-2xl flex"></i>
                </a>
                <div x-show="toggle" class="absolute top-14 left-0 w-48 bg-slate-200 p-2 rounded-md mt-1">
                    <ul>
                        <li>
                            <form action="{{ route('logout') }}" method="post" class="bg-white p-2 rounded-md">
                                @csrf
                                <button class="flex items-center gap-5 text-sm">
                                    <span x-show="menu">
                                        خروج از حساب
                                    </span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>




</div>
