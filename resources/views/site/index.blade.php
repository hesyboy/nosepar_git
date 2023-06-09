@extends('site.layouts.master')

@section('content')

<div class="flex flex-col gap-5 ">



    <div class="bg-gradient-to-b from-white to-[#EBF1FA] pb-40"
    style="clip-path: polygon(0 0, 100% 1%, 100% 80%, 0% 100%);">
        <div class="container mx-auto ">
            <div class="grid items-center grid-cols-2 gap-5 ">
                <div class="flex flex-col gap-10">
                    <div class="flex flex-col gap-3  font-bold text-blue-700 font-peyda-bold text-5xl">
                        <div class="font-peyda-bold">
                            بستر تعاملی متخصصان
                        </div>
                        <div>
                            <span>
                                هوش مصنوعی -
                            </span>
                            <span class="text-emerald-500">
                                علم داده
                            </span>
                        </div>
                    </div>
                    <div class="w-[550px] text-xl font-iranyekan-regular">
                        ما کارشناسان و علاقه مندان به علم داده را قادر می سازیم تا به طور مشترک مشکلات دنیای واقعی را از طریق چالش ها حل کنند.
                    </div>
                    <div class="flex gap-3 text-base">
                        @auth
                        <a href="{{ route('panel.index') }}" class="flex items-center gap-3 px-12 py-3 text-white bg-blue-600 rounded-md shadow-md hover:bg-blue-800 ">
                            <span class="hidden md:flex"> ورود به ناحیه کاربری  </span>
                        </a>
                        @else
                            <a href="{{ route('register') }}" class="flex items-center gap-3 px-12 py-3 text-white bg-blue-600 rounded-md shadow-md hover:bg-blue-800 ">
                                <span class="hidden md:flex">
                                    تیم سازی کنید
                                </span>
                            </a>
                            <a class="flex items-center gap-5 px-12 py-3 text-black bg-white rounded-md shadow-md">

                                <span class="">
                                    تعیین سطح کنید
                                </span>
                            </a>
                        @endauth

                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/images/alcrowd-banner1.png') }}" alt="">
                </div>
            </div>
            {{-- <div class="mb-20">
                <div class="mb-12 text-xl text-center text-gray-400">
                    <span>
                        با تشکر از
                    </span>
                </div>
                <div class="grid grid-cols-4 gap-8">
                    <div class="">
                        <img src="{{asset('assets/images/brand1.png')}}" alt="" srcset="">
                    </div>
                    <div>
                        <img src="{{asset('assets/images/brand2.png')}}" alt="" srcset="">
                    </div>
                    <div>
                        <img src="{{asset('assets/images/brand3.png')}}" alt="" srcset="">
                    </div>
                    <div>
                        <img src="{{asset('assets/images/brand4.png')}}" alt="" srcset="">
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="z-50 -mt-36 ">
        <div class="container mx-auto ">
            <div class="grid grid-cols-5 gap-5 ">
                <div class="flex flex-col justify-between col-span-2 py-20">
                    <div class="flex flex-col font-iranyekan-light text-xl">
                        <h2 class="mb-5 text-2xl text-black font-iranyekan-bold">
                            AIcrowd چطور کار میکنه؟
                        </h2>
                        <p>
                            از طریق این ویدیو با ساز و کار AIcrowd آشنا شوید!
                        </p>
                        <p>
                             ما همواره در تلاشیم تا محیطی پویا برای جامعه فعال هوش مصنوعی در ایران فراهم کنیم.
                        </p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="text-lg">
                            سوالی دارید؟ از ما بپرسید!
                        </div>
                        <div class="flex">
                            <a href="{{ route('site.contact-us') }}" class="flex items-center gap-3 px-12 py-3 text-blue-600 bg-blue-100 rounded-md hover:font-bold ">
                                <span class="hidden md:flex"> تماس با ما  </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-span-3">
                    <img src="{{ asset('assets/images/video.png') }}" alt="" srcset="" class="w-full">
                </div>
            </div>
        </div>

    </div>


    <div class=" bg-gradient-to-b from-[#EBF1FA] to-white pt-40 pb-20"
    style="clip-path: polygon(0 150px, 100% 1%, 100% 100%, 0% 100%);">
        <div class="container mx-auto ">
            <div class="flex flex-col gap-3" x-data="{tab:0}">
                <div class="flex justify-between text-black">
                    <div class="mb-5 text-2xl font-iranyekan-bold text-black">
                        متخصصین و تیم ها
                    </div>
                    <div class="flex gap-5">
                        <label for="radio1" class="flex items-center gap-1" @click="tab=0">
                            <input type="radio" id="radio1" name="radio-2" class="radio radio-primary" checked />
                            <span class="text-xl">تیم ها و شرکت ها</span>
                        </label>
                        <label for="radio2" class="flex items-center gap-1" @click="tab=1">
                            <input type="radio" id="radio2" name="radio-2" class="radio radio-primary" />
                            <span class="text-xl">متخصصان هوش مصنوعی    </span>
                        </label>

                    </div>
                </div>




                <div x-show="tab==0" class="flex flex-col gap-5">
                    <div>
                        <div class="">
                            <form action="">
                                <div class="flex items-center justify-between p-3 bg-white rounded-md font-iranyekan-light text-xl">
                                    <input class="w-full p-3 outline-none" type="text" placeholder="جستجو کنید...">
                                    <button>
                                        <i class="flex p-3 text-xl fi fi-rr-search"></i>
                                    </button>

                                </div>

                            </form>
                        </div>
                    </div>
                    <div>
                        <table class="w-full bg-white rounded-md shadow">
                            <thead class="w-full p-2">
                                <tr class="font-iranyekan-bold text-xl">
                                    <td class="p-4 w-72">
                                        نام تیم/شرکت
                                    </td>
                                    <td>
                                       اعضا
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ([1,2,3,4,5] as $i)
                                <tr class="border-t-2 border-gray-100 font-iranyekan-regular text-xl">
                                    <td class="p-3">
                                        <div class="flex items-center gap-5">
                                            <img src="{{ asset('assets/images/img2.png') }}" class="w-12" alt="">
                                            <span>
                                                داده پردازان
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        <div class="flex">
                                            <span class="-mr-2 h-7 w-7 rounded-full bg-blue-400 cursor-pointer hover:z-50"></span>
                                            <span class=" -mr-2 h-7 w-7 rounded-full bg-red-400 cursor-pointer hover:z-50"></span>
                                            <span class="-mr-2 h-7 w-7 rounded-full bg-emerald-400 cursor-pointer hover:z-50"></span>
                                            <span class=" -mr-2 h-7 w-7 rounded-full bg-indigo-400 cursor-pointer hover:z-50"></span>
                                            <span class=" -mr-2 h-7 w-7 rounded-full bg-gray-100 text-xs text-black flex items-center justify-center cursor-pointer hover:z-50">+9</span>

                                        </div>
                                    </td>
                                    <td class="p-3">
                                        <div class="flex justify-end gap-3">
                                            <div>
                                                <span class="p-2 font-iranyekan-regular text-base duration-200 bg-orange-200 rounded-md cursor-pointer hover:bg-orange-300">ML</span>
                                            </div>
                                            <div>
                                                <span class="p-2 font-iranyekan-regular text-base duration-200 bg-green-200 rounded-md cursor-pointer hover:bg-green-300">ML</span>
                                            </div>
                                            <div>
                                                <a class="px-6 py-2 font-iranyekan-regular text-base text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                                                    عضویت در تیم
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="flex justify-center mt-5">
                            <a class="p-4 text-blue-500 hover:text-white hover:bg-blue-600 bg-blue-100 rounded-md" href="">
                                <i class="fi fi-rr-angle-down text-xl flex"></i>
                            </a>
                        </div>
                    </div>
                </div>



                <div x-show="tab==1" class="flex flex-col gap-5">
                    <div>
                        <div class="">
                            <form action="">
                                <div class="flex items-center justify-between p-3 bg-white rounded-md font-iranyekan-light text-xl">
                                    <input class="w-full p-3 outline-none" type="text" placeholder="جستجو کنید...">
                                    <button>
                                        <i class="flex p-3 text-xl fi fi-rr-search"></i>
                                    </button>

                                </div>

                            </form>
                        </div>
                    </div>
                    <div>
                        <table class="w-full bg-white rounded-md shadow">
                            <thead class="w-full p-2">
                                <tr class="font-iranyekan-bold text-xl">
                                    <td class="p-4 w-72">
                                        نام متخصص
                                    </td>
                                    <td>
                                       تیم ها
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ([1,2,3,4,5] as $i)
                                <tr class="border-t-2 border-gray-100 font-iranyekan-regular text-xl">
                                    <td class="p-3">
                                        <div class="flex items-center gap-5">
                                            <img src="{{ asset('assets/images/img1.png') }}" class="w-12" alt="">
                                            <span>
                                                محمد طاها هاتفی
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        <div>
                                            <span>
                                                داده پردازان
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        <div class="flex justify-end gap-3">
                                            <div>
                                                <span class="p-2 font-iranyekan-regular text-base duration-200 bg-orange-200 rounded-md cursor-pointer hover:bg-orange-300">ML</span>
                                            </div>
                                            <div>
                                                <span class="p-2 font-iranyekan-regular text-base duration-200 bg-green-200 rounded-md cursor-pointer hover:bg-green-300">ML</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="flex justify-center mt-5">
                            <a class="p-4 text-blue-500 hover:text-white hover:bg-blue-600 bg-blue-100 rounded-md" href="">
                                <i class="fi fi-rr-angle-down text-xl flex"></i>
                            </a>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>






</div>


@endsection
