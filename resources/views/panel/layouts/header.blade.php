<div class="flex items-center justify-between w-full h-24 md:h-16 px-5 bg-white shadow">



    <div class="w-full flex flex-col gap-3 md:flex-row items-center justify-between py-3 md:items-center">


        <div>
            <div class="flex items-center gap-2 text-sm font-iranyekan-bold">
                <span>
                    هم اکنون
                </span>
                <div class="flex items-center gap-2 px-2 py-1 text-white rounded-md bg-emerald-500">
                    <span>
                        0
                    </span>
                    <img src="{{asset('assets/images/icons_diamond.svg')}}" alt="">
                </div>
                <span>
                    کوین نوسپار دارید!
                </span>
                <span class="mx-2 hidden md:flex">
                    <img src="{{asset('assets/images/happy.svg')}}" alt="">
                </span>

            </div>
        </div>

        <div class="flex flex-row-reverse items-center gap-3 px-2">

            <div class="relative" x-data="{'toggle':false}" @click.away="toggle=false">
                <a @click="toggle=!toggle" class="flex items-center gap-1 px-2 py-2 border-2 rounded-md cursor-pointer border-slate-100 hover:bg-slate-200">
                    <img src="{{asset('assets/images/panel-header-notification.png')}}" alt="">
                </a>

            </div>




            <div class="relative" x-data="{'toggle':false}" @click.away="toggle=false">
                <a @click="toggle=!toggle" class="flex items-center gap-5 px-2 py-2 border-2 rounded-md cursor-pointer border-slate-100 hover:bg-slate-200">
                    <span class="text-base text-blue-600">
                        55
                    </span>
                    <img src="{{asset('assets/images/panel-header-badge.png')}}" alt="">
                </a>
                <div x-show="toggle" x-cloak class="absolute left-0 px-2 mt-1 bg-white rounded-md shadow-lg top-14 w-52">
                    <ul class="flex flex-col">
                        <li class="px-2 py-2 border-b-2 border-slate-100">
                            <div class="mb-2 text-sm">
                                بج های من:
                            </div>
                            <div class="grid items-center grid-cols-3 gap-3 py-1 w-max">
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
                        </li>
                        <li class="px-2 py-3 border-b-2 border-slate-100">
                            <a href="{{route('panel.account.index')}}" class="text-sm font-bold">
                                ویرایش بج ها
                            </a>
                        </li>
                    </ul>
                </div>
            </div>





            <div class="relative" x-data="{'toggle':false}" @click.away="toggle=false">
                <a @click="toggle=!toggle" class="flex items-center gap-1 px-3 py-2 border-2 rounded-md cursor-pointer border-slate-100 hover:bg-slate-200">
                    <img src="{{asset('assets/images/panel-header-user.png')}}" alt="">
                </a>
                <div x-show="toggle" x-cloak class="z-50 absolute left-0 px-2 mt-1 bg-white rounded-md shadow-lg top-14 w-52">
                    <ul class="flex flex-col">
                        <li class="px-2 py-4 border-b-2 border-slate-100">
                            <a class="text-base" href="{{route('panel.profile.show',auth()->user()->code)}}">
                                پروفایل من
                            </a>
                        </li>
                        <li class="px-2 py-4 border-b-2 border-slate-100">
                            <a class="text-base">
                                تنظیمات
                            </a>
                        </li>
                        <li class="px-2 py-4">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                @method('post')
                                <button class="text-base text-red-600" type="submit">
                                    خروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>




        </div>
    </div>




</div>
@if (\App\Models\UserExpert::where('user_id',auth()->user()->id)->get()->first())

@else
<div class="px-3 py-3 pt-5">
    <div class="flex flex-col md:flex-row gap-3 items-center justify-between p-3 text-blue-800 bg-blue-100 rounded-md">
        <div class="text-base font-iranyekan-bold">
              اطلاعات پروفایل خود را تکمیل کنید !
        </div>

        <div class="flex items-center gap-3">
            {{-- <a href="{{route('panel.account.index')}}" class="flex px-6 py-2 text-base text-white bg-blue-600 rounded-md cursor-pointer font-iranyekan-regular hover:bg-blue-700" >
                <span>
                فعال سازی پروفایل
                </span>
            </a> --}}
            <a href="{{route('panel.account.index')}}"
            class="flex px-6 py-2 text-base bg-white text-blue-600 rounded-md cursor-pointer font-iranyekan-regular hover:font-bold" >
                <span>
                    تکمیل پروفایل
                </span>
            </a>
        </div>
    </div>
</div>
@endif

