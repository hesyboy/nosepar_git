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

            <div class="flex flex-col gap-5 mb-5 text-right">
                <h3 class="text-3xl font-iranyekan-bold">
                    تایید ایمیل
                </h3>
                <p class="text-lg text-gray-500">
                    یک کد تایید به ایمیل شما ارسال شد. برای افزایش امنیت حساب ، کد تایید دریافتی را وارد کنید
                </p>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-sm text-right text-gray-500">ایمیل شما</span>
                <div class="flex justify-between p-4 text-sm rounded-md shadow-md">
                    <span>
                        <i class="flex p-1 text-white rounded-full fi fi-rr-check bg-emerald-800"></i>
                    </span>
                    <span>
                        {{ auth()->user()->email }}
                    </span>
                </div>

            </div>

            <hr class="my-5">

            {{-- <div class="my-5">
                @if ($errors->any())
                    <div>

                        <ul class="mt-3 text-sm text-red-600 list-inside">
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
                        <label class="text-sm text-right text-gray-500" for="input">ایمیل</label>
                        <span class="text-xs text-red-500">
                            @error('input') <span>{{ $message }}</span> @enderror
                        </span>
                    </div>
                    <div class="relative">
                        <input class="w-full p-4 text-sm text-right border border-gray-400 rounded-md outline-blue-600"
                        placeholder=" کد تاییدیه خود را وارد کنید" type="text" wire:model.debounce="input" >

                        <span class="absolute top-4 left-4">
                            <img wire:loading wire:target="input" src="{{ asset('assets/images/spinner.png') }}" class="w-5 h-5 animate-spin">
                            @error('input')
                                <i class="flex text-xl text-red-500 fi fi-rr-exclamation" wire:loading.remove wire:target="input"></i>
                            @else
                                @if ($input!=null)
                                <i class="flex text-xl fi fi-rr-check text-emerald-500" wire:loading.remove wire:target="input"></i>
                                @endif
                            @enderror
                        </span>
                    </div>


                </div>



            </div>






            <div class="flex flex-col gap-1 mt-5">


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

            <div class="flex justify-between p-2 text-base">
                {{-- <span>

                    {{ $code }}
                </span> --}}
                {{-- <span class="text-blue-700" x-data>

                    @if ($timer>=1)
                        <span wire:poll.1000ms="timer" class="text-gray-500">
                            {{ $timer }} ثانیه
                        </span>
                    @endif

                    @if ($timer==0)
                        <a wire:click="sendCode" wire:loading.remove wire:target="sendCode" class="cursor-pointer hover:font-bold">
                            ارسال مجدد
                        </a>
                        <span wire:loading wire:target="sendCode">
                            <img src="{{ asset('assets/images/spinner.png') }}" class="w-5 h-5 animate-spin">
                        </span>
                    @endif


                </span> --}}

            </div>

            </div>
        </form>
        <div>

        </div>
    </div>
</div>
