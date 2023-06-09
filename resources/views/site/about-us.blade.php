@extends('site.layouts.master')

@section('content')


<div class="relative">
    <div class="bg-gradient-to-b from-blue-600 to-blue-600 pb-40 h-[600px] w-full absolute top-0 left-0 "
    style="clip-path: polygon(0 0, 100% 0%, 100% 80%, 0% 100%);">

    </div>

    <div class="container mx-auto z-50 relative py-28">
        <div class="flex flex-col gap-7 items-center text-white">
            <h1 class="flex flex-col gap-5 items-center font-peyda-bold text-6xl">
                <span>
                    درباره
                </span>
                <span>
                    AIcrowd
                </span>
            </h1>
            <div class="w-[70%] text-center text-xl leading-9">
                <p>
                    سال‌هاست که در کشور از یک چالش مهم به نام «انحصار» در حوزه‌های مختلف صحبت و گلایه میشه. آسیب‌های انحصار بسیار متنوع، متعدد و قابل توجه هستند. لذا ما باور داریم که باید همواره با تمام قدرت با این چالش مبارزه و اون رو محو کرد. ما دنبال شکستن این انحصار هستیم.
                </p>
            </div>
            <div>
                social
            </div>
        </div>
    </div>

</div>




<div class="container mx-auto relative pt-32 pb-20">
    <div class="grid grid-cols-2 gap-20">
        <div class="grid grid-cols-2 gap-8">
            @foreach ([1,2,3,4] as $item)
                <div class="flex flex-col gap-3">
                    <div class="my-1">
                        <img src="{{ asset('assets/images/Info-about.png') }}" alt="">
                    </div>
                    <div class="font-iranyekan-bold text-xl">
                        عنوان فیچر 1
                    </div>
                    <div class="text-gray-500 text-base">
                        لورم اپیسو ملورم اپیسو ملورم اپیسو ملورم اپیسوم لورم اپیسوم لورم اپیسوم
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            <div class="p-4 rounded-md bg-white shadow-xl flex flex-col gap-3">
                <img src="{{ asset('assets/images/about1.png') }}" alt="">

                <div class="font-iranyekan-bold text-xl">
                        ما در AIcrowd چه میکنیم؟
                </div>
                <p class="text-gray-500 text-justify text-base">
                        طرحی رو برنامه‌ریزی کردیم که با اجرای اون بتونیم امکان ارائه و اجرای پروژه‌ها و حل مسائل و چالش‌های مجموعه‌های مختلف کسب و کاری و دولتی در حوزه هوش مصنوعی رو برای همه متخصصین این حوزه (بدون درنظر گرفتن شرایط نامرتبط و ناعادلانه) میسر کنیم.
                </p>

            </div>
        </div>
    </div>
</div>







<div class="relative">
    <div class="bg-gradient-to-b from-blue-600 to-blue-600 pb-40 h-[600px] w-full absolute top-0 left-0 "
    style="clip-path: polygon(0 20%, 100% 0%, 100% 80%, 0% 100%);">

    </div>

    <div class="container mx-auto z-50  relative top-14 py-28">
        <div class="flex flex-col gap-8 text-white">
            <div class="text-right font-iranyekan-bold text-2xl">
                تیم AIcrowd
            </div>
            <div class="w-full grid grid-cols-3 gap-5">
                @foreach ([1,2,3,4,5,6] as $item )
                    <div class="bg-white rounded-lg p-3 text-black flex gap-3">
                        <img src="{{ asset('assets/images/team.png') }}" alt="" class="w-32 rounded-md">
                        <div class="flex flex-col gap-1 justify-center">
                            <span class="font-iranyekan-bold text-xl">
                                مصطفی محمدزاده
                            </span>
                            <span class="font-iranyekan-bold text-base text-blue-600">
                                مدیرعامل
                            </span>
                            <p class="text-gray-500 text-sm">
                                مشاور و هم بنیان‌گذار ناسا
                                بیش از 15 سال سابقه در مصور سازی داده
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>



@endsection
