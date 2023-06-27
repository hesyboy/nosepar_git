@extends('admin.layouts.master')

@section('content')


    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-sblack rounded-md">
                <i class="flex p-2 text-2xl  fi fi-rr-user bg-slate-800 text-white rounded-md"></i>
                <span class="font-bold"> مدیریت چالش      </span>
            </div>
            <div>
                <a href="{{ route('admin.challenge.create') }}" class="py-2 px-4 rounded-md bg-slate-800 text-white">
                    جدید
                </a>
            </div>
        </div>

        <div class="">

            <div>
                <table class="w-full rounded-md overflow-hidden">
                    <thead>
                        <tr class="text-right bg-slate-800 text-white">
                            <th class="p-3 font-thin">
                                id
                            </th>
                            <th class="p-3 font-thin">
                                نام چالش
                            </th>
                            <th class="p-3 font-thin">
                                تعداد تیم
                            </th>
                            <th class="p-3 font-thin">
                                تعداد متخصص
                            </th>
                            <th class="p-3 font-thin">
                                تاریخ ایجاد
                            </th>
                            <th class="p-3 font-thin">
                                عملیات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([] as $expert)
                        <tr class="p-2 bg-white">
                            <td class="p-3">
                                <img class="h-14 w-14 rounded-md" src="{{$expert->image}}" alt="">
                            </td>
                            <td class="p-3">
                                {{ $expert->title }}
                            </td>
                            <td class="p-3">
                                25
                            </td>
                            <td class="p-3">
                                35
                            </td>
                            <td class="p-3">
                                {{ $expert->created_at }}
                            </td>
                            <td class="p-3">
                                ...
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


            </div>
        </div>



    </div>

@endsection
