@extends('panel.layouts.master')

@section('content')


    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-sblack rounded-md">
                <i class="flex p-2 text-2xl  fi fi-rr-envelope bg-slate-800 text-white rounded-md"></i>
                <span class="font-bold">  پیام های من    </span>
            </div>
            <div>
                <a href="{{ route('panel.notifications.create') }}" class="py-2 px-4 rounded-md bg-indigo-900 text-white">
                    پیام جدید
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
                                فرستنده
                            </th>
                            <th class="p-3 font-thin">
                                متن پیام
                            </th>
                            <th class="p-3 font-thin">
                                تاریخ
                            </th>
                            <th class="p-3 font-thin">
                                عملیات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([] as $team)
                        <tr class="p-2 bg-white">
                            <td class="p-3">
                                {{ $team->id }}
                            </td>
                            <td class="p-3">
                                {{ $team->name }}
                            </td>
                            <td class="p-3">
                                {{ $team->owner }}
                            </td>
                            <td class="p-3">
                                {{ $team->experts }}
                            </td>
                            <td class="p-3">
                                {{ $team->created_at }}
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
