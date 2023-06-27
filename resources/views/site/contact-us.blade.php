@extends('site.layouts.master')

@section('content')


<div class="relative">
    <div class="bg-gradient-to-b from-blue-600 to-blue-600 pb-40 h-[600px] w-full absolute top-0 left-0 "
    style="clip-path: polygon(0 0, 100% 0%, 100% 80%, 0% 100%);">

    </div>
    <div class="container relative z-50 w-full pt-10 pb-20 mx-auto px-3">
        <div class="flex flex-col md:flex-row w-full gap-10 items-center">
            <div class="w-full md:w-1/2 flex flex-col gap-8 mt-20 text-white ">
                <h1 class="font-peyda-bold text-5xl text-white">
                    تماس با ما
                </h1>
                <p class="text-xl font-iranyekan-regular">
                    سوالی دارید؟ از ما بپرسید! کارشناسان ما آماده پاسخ‌گویی به تمامی سوالات شما هستند.
                </p>
                <div>
                    <div class="mt-3 text-xl font-iranyekan-regular">
                        <ul class="flex flex-col gap-3 px-2 text-white">
                            <li class="flex gap-3">
                                <i class="flex text-white fi fi-rr-marker"></i>
                                <span class="">
                                    تهران، دانشگاه علم و فرهنگ، پارک علم و فن‌آوری، طبقه ششم
                                </span>
                            </li>
                            <li class="flex gap-3">
                                <i class="flex text-white fi fi-rr-marker"></i>
                                <span class="">
                                    0936-61415579
                                </span>
                            </li>
                            <li class="flex gap-3">
                                <i class="flex text-white fi fi-rr-marker"></i>
                                <span class="">
                                    RP@aicrowd.ir
                                </span>
                            </li>
                        </ul>
                        <div class="mt-5">
                            <img src="{{asset('assets/images/map.png')}}" class="w-full">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-col gap-10 p-5 bg-white rounded-md shadow-md">
                <form action="">
                    <div class="flex flex-col gap-5">
                        <div class="text-xl font-iranyekan-regular">
                            ارسال پیام
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-sm text-right text-gray-500" for="email">
                                نام و نام خانوادگی
                            </label>
                            <input class="w-full p-4 text-sm text-right border border-gray-400 rounded-md outline-blue-600"
                            placeholder="نام خود را وارد کنید" type="email" name="email" value="{{old('email')}}"  autofocus>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label class="text-sm text-right text-gray-500" for="email">
                                شماره تماس
                            </label>
                            <input class="w-full p-4 text-sm text-right border border-gray-400 rounded-md outline-blue-600"
                            placeholder="شماره تماس خود را وارد کنید" type="email" name="email" value="{{old('email')}}"  autofocus>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label class="text-sm text-right text-gray-500" for="email">
                                ایمیل
                            </label>
                            <input class="w-full p-4 text-sm text-right border border-gray-400 rounded-md outline-blue-600"
                            placeholder="ایمیل خود را وارد کنید" type="email" name="email" value="{{old('email')}}"  autofocus>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label class="text-sm text-right text-gray-500" for="email">
                                پیام شما
                            </label>
                            <textarea class="w-full p-4 text-sm text-right border border-gray-400 rounded-md outline-blue-600"
                            placeholder="پیام خود را بنویسید " rows=8 name="email" value="{{old('email')}}"  ></textarea>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="w-full p-4 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                ارسال
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div>
            <div class="flex border border-blue-100 rounded-md p-3 h-48 mt-40 mb-20">
                <div>
                    <div class="hidden md:flex">
                        <img class="relative -top-36" src="{{ asset('assets/images/Frame.png') }}" alt="">
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="text-2xl font-iranyekan-bold">
                        شبکه های اجتماعی AIcrowd
                    </div>
                    <div class="text-xl font-iranyekan-regular text-gray-400">
                        مطالب ما رو بخونید، به ما پیام بدید و از آخرین فعالیت های ما با اطلاع شوید!
                    </div>
                    <div class="mt-5 flex gap-8">
                        <a href="">
                            <img src="{{ asset('assets/images/github-blue.png') }}" alt="">
                        </a>
                        <a href="">
                            <img src="{{ asset('assets/images/linkdin-blue.png') }}" alt="">
                        </a>
                        <a href="">
                            <img src="{{ asset('assets/images/telegram-blue.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>




@endsection
