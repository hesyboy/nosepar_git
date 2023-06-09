@extends('panel.layouts.master')

@section('content')


    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-indigo-900 rounded-md">
                <i class="flex p-1 text-2xl  fi fi-rr-users-alt"></i>
                <span>ایجاد پیام جدید     </span>
            </div>
            <div>
                <a href="{{ route('panel.notifications.index') }}" class="py-2 px-4 rounded-md bg-slate-800 text-white">
                    بازگشت
                </a>
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
            <form action="{{ route('panel.teams.store') }}" method="post" class="flex flex-col gap-6">
                @csrf
            <div class="flex gap-5 items-center">
                <div class="flex items-end gap-5">

                    <div class="flex flex-col gap-1">
                        <label for="">عنوان پیام </label>
                        <input type="text" name="name" value="" class="p-2 bg-slate-100 border rounded-md outline-none w-[350px]">
                    </div>
                </div>


            </div>


            <div class="flex items-end gap-5">

                <style>
                    .select2-selection.select2-selection--multiple {
                        background-color: #f1f5f9!important;
                        border:1px solid #e7e7e7!important;
                        padding: 7px;
                    }
                    span.select2-search.select2-search--dropdown{
                        display:none;
                    }

                    span.select2 {
                        width: 350px!important;
                    }

                    .select22>span{
                        width: 600px!important;
                    }
                </style>

                <div class="flex flex-col gap-1">
                    <label for="">ارسال به  </label>

                    <select class="select23 bg-slate-100 " multiple="multiple">
                    </select>

                    <script>
                        $(".select23").select2({
                            tags: true,

                        })

                    </script>
                </div>
            </div>


            <div class="flex flex-col gap-1">
                <label for="">متن پیام </label>
                <textarea name="" id="" cols="40" rows="10" class="bg-slate-100 rounded-md"></textarea>
            </div>




                <div>
                    <button type="submit" class="flex items-center gap-1 bg-indigo-900 hover:bg-indigo-800 duration-200 text-white p-3 rounded-md "> ارسال پیام</button>
                </div>
            </form>
        </div>


    </div>

@endsection
