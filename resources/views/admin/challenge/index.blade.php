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
                                برگزارکنندگان
                            </th>
                            <th class="p-3 font-thin">
                                تاریخ شروع
                            </th>
                            <th class="p-3 font-thin">
                                تاریخ پایان
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
                        @foreach ($challenges as $challenge)
                        <tr class="p-2 bg-white">
                            <td class="p-3">
                                <img class="h-14 w-14 rounded-md" src="{{$challenge->image}}" alt="">
                            </td>
                            <td class="p-3">
                                <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                    {{ $challenge->title }}
                                </span>
                            </td>
                            <td class="p-3">
                                <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                    {{ $challenge->organizer }}
                                </span>
                            </td>
                            <td class="p-3">
                                <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                    {{ $challenge->start_date }}
                                </span>
                            </td>
                            <td class="p-3">
                                <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                    {{ $challenge->end_date }}
                                </span>
                            </td>
                            <td class="p-3">
                                <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                    {{ $challenge->created_at }}
                                </span>
                            </td>
                            <td class="p-3 flex flex-col gap-2">
                                <a href="{{route('admin.challenge.edit',$challenge->id)}}" class="w-full py-1 px-4 rounded-md bg-blue-600 text-white text-center">
                                    اصلاح
                                </a>
                                <form action="{{route('admin.challenge.delete',$challenge->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="w-full px-4 py-1 bg-red-500 text-white rounded-md">
                                        حذف چالش
                                    </button>
                                </form>
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
