@extends('panel.layouts.master')

@section('content')


    <div class="container p-3 mx-auto">
        {{-- <div class="flex items-center justify-between p-3 mb-3 bg-white rounded-md shadow-md">
            <div class="flex items-center gap-3 text-lg font-bold text-white bg-indigo-900 rounded-md py-2 px-4">
                <i class="flex p-1 text-2xl  fi fi-rr-apps"></i>
                <span>پنل کاربری</span>
            </div>
            <div class="text-sm font-bold">
                hesamahmoodi@gmail.com
            </div>
        </div> --}}
        <div class="flex gap-3">

            <div class="w-full p-3 bg-white rounded-md shadow-md flex items-center justify-center">
                <div class="flex flex-col gap-3 items-center justify-center bg-slate-200 p-3 rounded-md">
                    <div class="text-2xl">
                        به پنل کاربری AICrowd خوش آمدید
                    </div>
                    <div class="text-lg">
                        برای تکمیل اطلاعات کاربری
                        <a class="text-indigo-900 font-bold" href="#">اینجا</a>
                        کلیک کنید
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
