<div>





            <div class="p-10 bg-gray-50 w-full flex flex-col gap-20 items-center h-full">
                <div class="w-full flex justify-between">
                    <div class="">
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-black text-lg flex items-center gap-2">
                            <i class="fi fi-rr-angle-right flex"></i>
                            <span>
                                بازگشت
                            </span>
                        </a>
                    </div>
                    <div class="flex gap-2 items-center">

                    </div>

                </div>
                <form wire:submit.prevent="save" class="w-[400px]">
                    @csrf

                    <div class="text-right mb-5 flex flex-col gap-5">
                        <h3 class="text-3xl font-iranyekan-bold">
                            بازیابی رمز عبور
                        </h3>
                        <p class="text-gray-500 text-lg">
                            با وارد کردن آدرس ایمیلی که با آن ثبت‌نام کرده‌اید، لینک بازنشانی رمز عبور برای شما ارسال می‌شود
                        </p>
                    </div>
                    <hr class="my-5">
                    {{-- <div class="my-5">
                        @if ($errors->any())
                            <div>

                                <ul class="mt-3 list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div> --}}
                    <div class="flex flex-col gap-5">
                                    <!-- Email Address -->
                                    <div class="flex flex-col gap-1">
                                        <div class="flex justify-between">
                                            <label class="text-right text-gray-500 text-sm" for="email">ایمیل</label>
                                            <span class="text-xs text-red-500">
                                                @error('email') <span>{{ $message }}</span> @enderror
                                            </span>
                                        </div>
                                        <div class="relative">
                                            <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                            placeholder="ایمیل خود را وارد کنید" type="text" wire:model.debounce="email" >

                                            <span class="absolute top-4 left-4">
                                                <img wire:loading wire:target="email" src="{{ asset('assets/images/spinner.png') }}" class="animate-spin w-5 h-5">
                                                @error('email')
                                                    <i class="fi fi-rr-exclamation text-xl text-red-500 flex" wire:loading.remove wire:target="email"></i>
                                                @else
                                                    @if ($email!=null)
                                                    <i class="fi fi-rr-check text-xl text-emerald-500 flex" wire:loading.remove wire:target="email"></i>
                                                    @endif
                                                @enderror
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
                            <a class="text-base text-blue-600  hover:font-bold" href="{{ route('login') }}">
                                بازگشت به ورود با ایمیل
                            </a>


                    <div class="w-full">
                        <button type="submit" class="w-full p-4 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                            ارسال لینک بازنشانی رمز عبور
                        </button>

                    </div>

                    </div>
                </form>
                <div>

                </div>
            </div>






</div>
