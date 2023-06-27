<div>
    <div class="p-5 md:p-10 bg-gray-50 w-full flex flex-col gap-20 items-center h-full">
        <div class="w-full flex justify-end">
            <div class="flex gap-2 items-center text-lg">
                <span class="text-gray-500 ">
                    حساب کاربری دارید؟
                </span>
                <a href="{{route('login')}}" class="text-blue-600 hover:font-bold">
                    وارد شوید
                </a>
            </div>
        </div>
        <form wire:submit.prevent="save" class="w-full md:w-[400px]">
            @csrf

            <div class="text-right mb-5 flex flex-col gap-5">
                <h3 class="text-3xl font-iranyekan-bold">
                    ثبت نام
                </h3>
                <p class="text-gray-500 text-lg">
                    برای ساخت حساب کاربری ، اطلاعات خود را وارد کنید
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


                <!-- Password -->
                <div class="flex flex-col gap-1">
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



            <div class="flex flex-col gap-5 mt-5" x-data="{toggle:false,checkbox:true}">
                <div class="flex justify-between items-center">
                    <div class="w-full flex gap-2 items-center">
                        <label class="flex gap-2">

                            <input type="checkbox" wire:model.debounce="law" class="checkbox checkbox-primary border-gray-400"/>



                        </label>

                        <div class="text-sm text-gray-500">
                            <span>
                                با
                            </span>
                            <span class="text-blue-600 cursor-pointer hover:font-bold" @click="toggle=true">
                                قوانین و مقررات
                            </span>
                            <span>
                                موافقت می کنم
                            </span>
                          </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span>
                            @error('law')
                                <i class="fi fi-rr-exclamation text-xl text-red-500 flex" wire:loading.remove wire:target="law"></i>
                            @enderror
                        </span>
                    </div>
                </div>

                <div x-show="toggle" x-cloak  x-transition class="w-screen h-screen bg-black/70 absolute top-0 left-0 flex items-center justify-center">
                    <div class=" container mx-auto flex items-center justify-center">
                        <div class="p-5 bg-white rounded-md "  @click.away="toggle=false">
                            <div class="font-iranyekan-bold text-2xl">
                                قوانین و مقررات
                            </div>
                            <hr class="my-5">
                            <p class="font-iranyekan-light text-base leading-8">
                                در حوزه تخصصی ما (هوش مصنوعی، علم داده و یادگیری ماشین) یکی از انواع انحصار، توزیع پروژه‌های بخش‌های مختلف دولتی یا تجاری (کسب و کارها) بین تعداد محدودی از شرکت‌ها هست. این «انحصار نسبی» ممکنه ناخواسته ایجاد شده باشه، اما به‌هرحال آسیب‌های متعددی برای افراد مرتبط با این حوزه تخصصی (اعم از متخصصین، مدیران، کاربران، کارفرماها، مشتریان و …) ایجاد کرده و خواهد کرد. کیفیت پایین حل مسائل و برخی محصولات تولید شده، هزینه بالای انجام پروژه‌ها، نرخ بالای شکست پروژه‌ها و هدر رفت منابع، رقابت ناسالم و ناعادلانه در کسب و کار، محدود شدن موقعیت‌های شغلی، عدم دستیابی بخشی از متخصصین به جایگاه شغلی مناسب، توزیع ناعادلانه درآمد و … فقط بخشی از آسیب‌های این وضع هستن.
                                <br>
                                ما دنبال شکستن این انحصار هستیم. برای همین طرحی رو برنامه‌ریزی کردیم که با اجرای اون بتونیم امکان ارائه و اجرای پروژه‌ها و حل مسائل و چالش‌های مجموعه‌های مختلف کسب و کاری و دولتی در حوزه هوش مصنوعی رو برای همه متخصصین این حوزه (بدون درنظر گرفتن شرایط نامرتبط و ناعادلانه) میسر کنیم.
                                <br>
                                شما در حال مشاهده گام اول فعالیت ما در قالب این سایت ساده هستید. تو این مرحله، خواستیم ماجرا رو از خودمون شروع کنیم. لذا تصمیم گرفتیم پروژه‌هایی که بهمون پیشنهاد شده و نیازهایی که شناختیم رو (به‌جای اینکه با تیم خودمون اجرا کنیم) با استفاده از نوآوری باز و برون‌سپاری (ترجیحا جمع‌سپاری) حل کنیم تا قدم اول رو در تحقق هدفمون و اجرای طرحی که داریم برداریم. این توضیح هم لازمه که این پروژه‌ها به واسطه سابقه طولانی افراد تیم ما در حوزه تخصصی نرم‌افزار و هوش مصنوعی و اعتمادی که طی سال‌ها فعالیت تخصصی و مدیریتی ما در مجموعه‌های مختلف نسبت بهمون ایجاد شده به‌دستمون رسیدن.
                                <br>
                                شما دعوت می‌کنیم (با هر نقش و جایگاهی) اگر جزو جامعه مخاطبین فناوری‌های مرتبط با هوش مصنوعی هستین (متخصص، مدیر، کارفرما، کاربر و …) به ما بپیوندین تا باهم بتونیم الگویی برای توزیع عدالت، صداقت و خدمتِ تخصص‌محورِ با کیفیت در کشور ایجاد کنیم.
                            </p>
                            <div class="flex justify-end gap-5 mt-5">
                                <span class="px-8 py-4 text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer font-iranyekan-bold text-base "
                                @click="$wire.law=1,toggle=false">
                                    موافقت میکنم
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

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


                <hr class="my-5">


                <a href="{{route('google.auth.redirect')}}" class="w-full p-4 text-black bg-white shadow-md rounded-md flex items-center justify-center gap-3">
                    <img src="{{ asset('assets/images/google.png') }}" alt="" srcset="" class="w-6">
                    <span class="">
                        ثبت نام با گوگل
                    </span>
                </a>
            </div>

            </div>
        </form>
        <div>

        </div>
    </div>
</div>
