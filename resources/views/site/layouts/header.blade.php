<div class="border-b-2 border-b-gray-300 ">


    {{-- <div class="py-2 bg-indigo-900 drop-shadow-md">
            <div class="container px-1 mx-auto">
                <div class="flex items-center justify-center">
                    <div class="text-xl text-white">
                        AI Crowd
                    </div>
                </div>
            </div>
    </div> --}}

      <div class="container mx-auto  w-screen">
        <div class="flex items-center justify-between md:items-center py-2 md:py-0">
            <div class="relative md:hidden " x-data="{'menu':false}">
                <div class="px-4 flex items-center justify-center cursor-pointer">
                    <i class="flex text-3xl fi fi-rr-menu-burger" x-show="!menu" x-cloak @click="menu=!menu"></i>
                    <i class="flex text-3xl fi fi-rr-cross" x-show="menu" x-cloak @click="menu=!menu"></i>
                    <span class="mx-4  text-2xl text-blue-700 font-peyda-bold">
                        نوسپار
                    </span>
                </div>
                <div x-show="menu" x-cloak x-transition @click.away="menu=false" class="  z-[100] absolute top-12 right-0 ">

                    <ul class="flex flex-col items-center justify-center gap-1 text-sm font-semibold bg-white p-3 rounded-md shadow-md w-screen ">
                        <li>
                            <a href="{{ route('site.index') }}" class=" p-2 rounded-md flex items-center gap-1
                            @if (request()->routeIs('site.index'))
                            text-blue-600 font-bold
                            @else
                            text-black
                            @endif
                            ">
                                <span>صفحه اول</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.about-us') }}" class="p-2 rounded-md flex items-center gap-1
                            @if (request()->routeIs('site.about-us'))
                            text-blue-600 font-bold
                            @else
                            text-black
                            @endif">
                                <span>درباره ما</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.contact-us') }}"  class="p-2 rounded-md flex items-center gap-1
                            @if (request()->routeIs('site.contact-us'))
                            text-blue-600 font-bold
                            text-black
                            @endif" >
                                <span>تماس با ما</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="items-center hidden gap-8 py-1 md:flex">
                <div class="px-2">
                    <img src="{{ asset('assets/images/logo-new.svg') }}" alt="" class="h-16">
                </div>
                <div>
                    <ul class="flex items-center gap-8 text-base">
                        <li>
                            <a href="{{ route('site.index') }}" class=" p-2 rounded-md flex items-center gap-1
                            @if (request()->routeIs('site.index'))
                            text-blue-600 font-bold
                            @else
                            text-black
                            @endif
                            ">
                                <span>صفحه اول</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.about-us') }}" class="p-2 rounded-md flex items-center gap-1
                            @if (request()->routeIs('site.about-us'))
                            text-blue-600 font-bold
                            @else
                            text-black
                            @endif">
                                <span>درباره ما</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.contact-us') }}"  class="p-2 rounded-md flex items-center gap-1
                            @if (request()->routeIs('site.contact-us'))
                            text-blue-600 font-bold
                            text-black
                            @endif" >
                                <span>تماس با ما</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex items-center gap-3 px-2">
                @auth
                    <a href="{{ route('panel.index') }}" class="text-sm flex items-center gap-3 px-4 md:px-12 py-3 text-white bg-blue-700 rounded-md hover:bg-blue-800 ">
                        <span class="">  ناحیه کاربری</span>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="text-sm flex items-center gap-3 px-4 md:px-12 py-3 text-black bg-gray-200 rounded-md hover:bg-gray-300 ">
                            <span class="">  خروج </span>
                        </button>
                    </form>

                @else
                    {{-- <a href="{{ route('login') }}" class="flex items-center gap-3 px-8 py-3 font-bold text-blue-700 rounded-md hover:font-bold">
                        <span class="hidden md:flex">
                            ورود / ثبت نام
                        </span>
                    </a> --}}
                    <a href="{{ route('login') }}" class="flex items-center gap-3 px-6 md:px-12 py-2 md:py-3 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-800 ">
                        <span class="flex">
                            ورود / ثبت نام
                        </span>
                    </a>
                @endauth


            </div>
        </div>
    </div>




</div>
