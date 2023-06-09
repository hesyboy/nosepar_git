<div>
    <div class="p-10 bg-gray-50 w-full flex flex-col items-center justify-between h-full">
        <div class="w-full flex justify-end">
            <div class="flex gap-2 items-center">
                <span class="text-gray-500 text-sm ">
                    حساب کاربری دارید؟
                </span>
                <a href="{{route('login')}}" class="text-blue-700 hover:font-bold">
                    وارد شوید
                </a>
            </div>
        </div>
        <form method="POST" action="{{ route('login') }}" class="w-96">
            @csrf

            <div class="text-right mb-5 flex flex-col gap-3">
                <h3 class="font-bold text-2xl">
                    تایید ایمیل
                </h3>
                <p class="text-gray-500 text-sm">
                    یک کد تایید به ایمیل شما ارسال شد. برای افزایش امنیت حساب ، کد تایید دریافتی را وارد کنید
                </p>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-right text-gray-500 text-sm">ایمیل شما</span>
                <div class="flex justify-between p-4 shadow-md rounded-md text-sm">
                    <span>
                        <i class="fi fi-rr-check bg-emerald-800 p-1 rounded-full flex text-white"></i>
                    </span>
                    <span>hesamahmoodi@gmail.com</span>
                </div>

            </div>

            <hr class="my-5">

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
                    <label class="text-right text-gray-500 text-sm" for="email">کد تایید 4 رقمی</label>
                    <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                     placeholder="نام کاربری خود را وارد کنید" type="email" name="email" value="{{old('email')}}"  autofocus>
                </div>



            </div>






            <div class="flex flex-col gap-5 mt-5">


            <div class="w-full">
                <button type="submit" class="w-full p-4 text-white bg-blue-700 rounded-md">ثبت نام  </button>

            </div>

            </div>
        </form>
        <div>

        </div>
    </div>
</div>
