@extends('panel.layouts.master')

@section('content')


    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-indigo-900 rounded-md">
                <i class="flex p-1 text-2xl  fi fi-rr-user-pen"></i>
                <span>تنظیمات پروفایل  </span>
            </div>
        </div>

        @if ($errors->any())
            <div class="flex gap-1">
                @foreach ($errors->all() as $error)
                    <span class=" p-3 bg-red-100 rounded-md text-sm text-red-800">
                        {{ $error }}
                    </span>
                @endforeach
            </div>
        @endif

        <div class="flex items-center justify-between p-5 bg-white rounded-md">
            <form action="" method="post" class="flex flex-col gap-6">
                @csrf
                <div class="flex items-end gap-5">
                    <div class="flex flex-col gap-1">
                        <label for="">انتخاب نوع پروفایل </label>
                        <div class="flex gap-10 border p-3 rounded-md bg-slate-100">
                            <div class="flex items-center gap-2">
                                <input type="radio" name="radio-1" class="radio" />
                                <span>پروفایل شخصی</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="radio" name="radio-1" class="radio" />
                                <span>پروفایل شرکتی</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div>
                    <button type="submit" class="flex items-center gap-1 bg-indigo-900 hover:bg-indigo-800 duration-200 text-white p-3 rounded-md ">ثبت تغییرات</button>
                </div>
            </form>
        </div>

    </div>

@endsection
