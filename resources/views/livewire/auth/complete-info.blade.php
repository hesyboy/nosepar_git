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
            <div>

            </div>
        </div>
        <form wire:submit.prevent="save" class="w-[400px]">
            @csrf

            <div class="text-right mb-5 flex flex-col gap-3">
                <h3 class="text-3xl font-iranyekan-bold">
                    اطلاعات تکمیلی
                </h3>
                <p class="text-gray-500 text-lg">
                    به منظور ارائه تجربه بهتر، سایر اطلاعات خود را وارد کنید
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

                <!-- name -->
                <div class="flex flex-col gap-1">
                    <div class="flex justify-between">
                        <label class="text-right text-gray-500 text-sm" for="name">نام</label>
                        <span class="text-xs text-red-500">
                            @error('name') <span>{{ $message }}</span> @enderror
                        </span>
                    </div>
                    <div class="relative">
                        <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                        placeholder="" type="text" wire:model.debounce="name" >

                        <span class="absolute top-4 left-4">
                            <img wire:loading wire:target="name" src="{{ asset('assets/images/spinner.png') }}" class="animate-spin w-5 h-5">
                            @error('name')
                                <i class="fi fi-rr-exclamation text-xl text-red-500 flex" wire:loading.remove wire:target="name"></i>
                            @else
                                @if ($name!=null)
                                <i class="fi fi-rr-check text-xl text-emerald-500 flex" wire:loading.remove wire:target="name"></i>
                                @endif
                            @enderror
                        </span>
                    </div>
                </div>


                <!-- last name -->
                <div class="flex flex-col gap-1">
                    <div class="flex justify-between">
                        <label class="text-right text-gray-500 text-sm" for="lastname">نام خانوادگی</label>
                        <span class="text-xs text-red-500">
                            @error('lastname') <span>{{ $message }}</span> @enderror
                        </span>
                    </div>
                    <div class="relative">
                        <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                        placeholder="" type="text" wire:model.debounce="lastname" >

                        <span class="absolute top-4 left-4">
                            <img wire:loading wire:target="lastname" src="{{ asset('assets/images/spinner.png') }}" class="animate-spin w-5 h-5">
                            @error('lastname')
                                <i class="fi fi-rr-exclamation text-xl text-red-500 flex" wire:loading.remove wire:target="lastname"></i>
                            @else
                                @if ($lastname!=null)
                                <i class="fi fi-rr-check text-xl text-emerald-500 flex" wire:loading.remove wire:target="lastname"></i>
                                @endif
                            @enderror
                        </span>
                    </div>


                </div>


                <!-- phone -->
                <div class="flex flex-col gap-1">
                    <div class="flex justify-between">
                        <label class="text-right text-gray-500 text-sm" for="phone">شماره تماس </label>
                        <span class="text-xs text-red-500">
                            @error('phone') <span>{{ $message }}</span> @enderror
                        </span>
                    </div>
                    <div class="relative">
                        <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                        placeholder="" type="text" wire:model.debounce="phone" >

                        <span class="absolute top-4 left-4 flex ">
                            <span class="mx-3">
                               | 98+
                            </span>
                            <img wire:loading wire:target="phone" src="{{ asset('assets/images/spinner.png') }}" class="animate-spin w-5 h-5">
                            @error('phone')
                                <i class="fi fi-rr-exclamation text-xl text-red-500 flex" wire:loading.remove wire:target="phone"></i>
                            @else
                                @if ($phone!=null)
                                <i class="fi fi-rr-check text-xl text-emerald-500 flex" wire:loading.remove wire:target="phone"></i>
                                @endif
                            @enderror
                        </span>
                    </div>


                </div>





                <!-- contact way -->
                <div class="flex flex-col gap-1">
                    <div class="flex justify-between">
                        <label class="text-right text-gray-500 text-sm" for="contact_way">نحوه آشنایی </label>
                        <span class="text-xs text-red-500">
                            @error('contact_way') <span>{{ $message }}</span> @enderror
                        </span>
                    </div>
                    <div class="relative">
                        {{-- <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                        placeholder="" type="text" wire:model.debounce="contact_way" > --}}
                        <select name="" id="" class="w-full p-3 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                        wire:model.debounce="contact_way">
                            <option value=""></option>
                            <option value="0">
                                جستجو در گوگل
                            </option>
                            <option value="1">
                                شبکه های اجتماعی
                            </option>
                            <option value="2">
                                جلسات مشاوره ای
                            </option>
                        </select>

                        <span class="absolute top-4 left-4">
                            <img wire:loading wire:target="contact_way" src="{{ asset('assets/images/spinner.png') }}" class="animate-spin w-5 h-5">
                            @error('contact_way')
                                <i class="fi fi-rr-exclamation text-xl text-red-500 flex" wire:loading.remove wire:target="contact_way"></i>
                            @else
                                @if ($contact_way!=null)
                                <i class="fi fi-rr-check text-xl text-emerald-500 flex" wire:loading.remove wire:target="contact_way"></i>
                                @endif
                            @enderror
                        </span>
                    </div>


                </div>

                <!-- Password -->
                {{-- <div class="flex flex-col gap-1">
                    <div class="flex justify-between">
                        <label class="text-right text-gray-500 text-sm" for="password">رمز عبور</label>
                        <span class="text-xs text-red-500">
                            @error('password') <span>{{ $message }}</span> @enderror
                        </span>
                    </div>
                    <div class="relative" x-data="{showpass:false}">
                        <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                        placeholder="رمز عبور خود را وارد کنید" type="password" wire:model.debounce="password" :type="showpass ? 'text' : 'password' " >
                        <div class="absolute top-4 left-4 flex items-center gap-3">
                            <span>
                                <img wire:loading wire:target="password" src="{{ asset('assets/images/spinner.png') }}" class="animate-spin w-5 h-5">
                                @error('password')
                                    <i class="fi fi-rr-exclamation text-xl text-red-500 flex" wire:loading.remove wire:target="password"></i>
                                @else
                                    @if ($password!=null)
                                    <i class="fi fi-rr-check text-xl text-emerald-500 flex" wire:loading.remove wire:target="password"></i>
                                    @endif
                                @enderror
                            </span>
                            <span class=" cursor-pointer" @click="showpass=!showpass">
                                <i class="fi fi-rr-eye text-xl flex" x-show="showpass"></i>
                                <i class="fi fi-rr-eye-crossed text-xl flex" x-show="!showpass"></i>
                            </span>
                        </div>

                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <div class="flex justify-between">
                        <label class="text-right text-gray-500 text-sm" for="password_confirmation">تکرار رمز عبور</label>
                        <span class="text-xs text-red-500">
                            @error('password_confirmation') <span>{{ $message }}</span> @enderror
                        </span>
                    </div>
                    <div class="relative" x-data="{showpass:false}">
                        <input class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                        placeholder="رمز عبور خود را وارد کنید" type="password" wire:model.debounce="password_confirmation" :type="showpass ? 'text' : 'password' " >
                        <div class="absolute top-4 left-4 flex items-center gap-3">
                            <span>
                                <img wire:loading wire:target="password_confirmation" src="{{ asset('assets/images/spinner.png') }}" class="animate-spin w-5 h-5">
                                @error('password_confirmation')
                                    <i class="fi fi-rr-exclamation text-xl text-red-500 flex" wire:loading.remove wire:target="password_confirmation"></i>
                                @else
                                    @if ($password_confirmation!=null)
                                    <i class="fi fi-rr-check text-xl text-emerald-500 flex" wire:loading.remove wire:target="password_confirmation"></i>
                                    @endif
                                @enderror
                            </span>
                            <span class=" cursor-pointer" @click="showpass=!showpass">
                                <i class="fi fi-rr-eye text-xl flex" x-show="showpass"></i>
                                <i class="fi fi-rr-eye-crossed text-xl flex" x-show="!showpass"></i>
                            </span>
                        </div>

                    </div>
                </div> --}}


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



            <div class="flex flex-col gap-5 mt-8" x-data="{toggle:false,checkbox:true}">



            <div class="w-full">
                <button type="submit" wire:loading.remove wire:target="save"
                 class="w-full p-4 text-white bg-blue-600 hover:bg-blue-700 rounded-md flex items-center justify-center">
                    <span >
                        ادامه
                    </span>
                </button>

                <div wire:loading wire:target="save" class="w-full p-4 text-white bg-blue-600 hover:bg-blue-700 rounded-md flex items-center justify-center">
                    <div  class="flex justify-center items-center">
                        <i class="fi fi-rr-spinner text-2xl flex animate-spin w-6 h-6" ></i>
                    </div>
                </div>


            </div>

            </div>
        </form>
        <div>

        </div>
    </div>
</div>
