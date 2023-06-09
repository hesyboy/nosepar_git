@extends('site.layouts.master')

@section('content')

<div class="flex flex-col">

    <div class="relative h-[450px] w-full bg-slate-200 overflow-hidden" style="video">
        <video autoplay muted loop class="absolute top-0 left-0 z-0 w-full object-cover h-full">
            <source src="{{ asset('assets/videos/cover.mp4') }}" type="video/mp4">
          </video>
        <div class="absolute top-0 left-0 z-10 h-full w-full bg-slate-800/60"></div>
        <div class="absolute top-0 left-0 z-50 flex items-center justify-center w-full h-full">
            <div class="flex flex-col gap-4 items-center drop-shadow-md">
                <div class=" text-white text-5xl md:text-7xl font-bold">
                    AI Crowd
                </div>
                <div class=" text-white text-xl md:text-2xl">
                    خانه متخصصان هوش مصنوعی
                </div>
                <div class="flex flex-col md:flex-row gap-5">
                    <a class="border border-white rounded-md py-2 px-4 bg-white text-base font-bold" href="">عضویت جدید در سایت</a>
                    <a class="border border-white rounded-md py-2 px-4 bg-white text-base font-bold" href="">ثبت اطلاعات متخصص </a>

                </div>

            </div>
        </div>


    </div>

</div>


@endsection
