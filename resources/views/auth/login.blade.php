<x-guest-layout>
    <div class="grid grid-cols-2 h-screen" dir="rtl">


        <div class="bg-blue-700 px-20 pt-40 pb-10 text-right text-white flex flex-col items-center justify-between"
        style="background-image: url('{{ asset('assets/images/login.png') }}');">
            <div class="flex flex-col gap-14">
                <div class="flex ">
                    <img src="http://127.0.0.1:8000/assets/images/aicrowd2.png" alt="" class="h-24">
                </div>
                <div class="flex flex-col gap-8">
                    <h2 class="text-4xl font-iranyekan-bold">
                        جمع سپاری پروژه های علم داده
                    </h2>
                    <p class="pl-20 text-lg leading-10 ">
                        ما کارشناسان و علاقه مندان به علم داده را قادر می سازیم تا به طور مشترک مشکلات دنیای واقعی را از طریق چالش ها حل کنند.
                    </p>
                </div>
            </div>
            <div class="w-full flex flex-col gap-5">
                <div class="flex gap-5 text-2xl">
                    <div>
                        <i class="fi fi-brands-github"></i>
                    </div>
                    <div>
                        <i class="fi fi-brands-linkedin"></i>
                    </div>
                    <div>
                        <i class="fi fi-brands-telegram"></i>
                    </div>
                </div>
                <div class="flex gap-1 text-base">
                    <span>
                        2023 -
                    </span>
                    <span>
                        تمامی حقوق برای سایت
                    </span>
                    <span>
                        AIcrowd.ir
                    </span>
                    <span>
                        محفوظ است
                    </span>
                </div>
            </div>
        </div>




        <div class="p-10 bg-gray-50 w-full flex flex-col gap-20 items-center h-full">
            <div class="w-full flex justify-end">
                <div class="flex gap-2 items-center text-lg">
                    <span class="text-gray-500  ">
                        حساب کاربری ندارید؟
                    </span>
                    <a href="{{route('register')}}" class="text-blue-600 hover:font-bold">
                        ثبت نام کنید
                    </a>
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}" class="w-[400px]">
                @csrf

                <div class="text-right mb-5 flex flex-col gap-3">
                    <h3 class="text-3xl font-iranyekan-bold">
                        ورود
                    </h3>
                    <p class="text-gray-500 text-lg">
                        برای ورود ، اطلاعات کاربری خود را وارد کنید
                    </p>
                </div>
                <hr>
                <div class="my-5">
                    @if ($errors->any())
                        <div>

                            <ul class="mt-3 list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="flex flex-col gap-5">
                                <!-- Email Address -->
                    <div class="flex flex-col gap-1">
                        <label class="text-right text-gray-500 text-sm" for="email">نام کاربری    </label>
                        <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                         placeholder="نام کاربری خود را وارد کنید" type="email" name="email" value="{{old('email')}}"  autofocus>
                    </div>


                    <!-- Password -->
                    <div class="flex flex-col gap-1">
                        <label class="text-right text-gray-500 text-sm" for="password">پسورد</label>
                        <div class="relative" x-data="{showpass:false}">
                            <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                            placeholder="رمز عبور خود را وارد کنید" type="password" name="password" :type="showpass ? 'text' : 'password' " >
                            <span class="absolute top-2 left-0 p-2 cursor-pointer" @click="showpass=!showpass">
                                <i class="fi fi-rr-eye text-xl" x-show="showpass"></i>
                                <i class="fi fi-rr-eye-crossed text-xl" x-show="!showpass"></i>
                            </span>
                        </div>
                    </div>
                </div>


                <!-- Remember Me -->
                {{-- <div class="block mt-4 text-right">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">
                            مرا به خاطر بسپار
                        </span>
                    </label>
                </div> --}}



                <div class="flex flex-col gap-5 mt-5">
                    @if (Route::has('password.request'))
                        <a class="text-base text-blue-600  hover:font-bold" href="{{ route('password.request') }}">
                            فراموشی رمز عبور
                        </a>
                    @endif

                <div class="w-full">
                    <button type="submit" class="w-full p-4 text-white bg-blue-600 hover:bg-blue-700 rounded-md flex items-center justify-center">
                        ورود
                    </button>

                    <hr class="my-5">

                    <a href="{{route('google.auth.redirect')}}" class="w-full p-4 text-black bg-white shadow-md rounded-md flex items-center justify-center gap-3">
                        <img src="{{ asset('assets/images/google.png') }}" alt="" srcset="" class="w-6">

                        <span class="">
                            ورود با گوگل
                        </span>

                    </a>
                </div>

                </div>
            </form>
            <div>

            </div>
        </div>


    </div>

</x-guest-layout>
