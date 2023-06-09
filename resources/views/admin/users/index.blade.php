@extends('admin.layouts.master')

@section('content')


    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-sblack rounded-md">
                <i class="flex p-2 text-2xl  fi fi-rr-user bg-slate-800 text-white rounded-md"></i>
                <span class="font-bold"> مدیریت کاربران سایت    </span>
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
                                کد کاربری
                            </th>
                            <th class="p-3 font-thin">
                                ایمیل
                            </th>
                            <th class="p-3 font-thin">
                                موبایل
                            </th>
                            <th class="p-3 font-thin">
                                تاریخ عضویت
                            </th>
                            <th class="p-3 font-thin">
                                عملیات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="p-2 bg-white">
                            <td class="p-3">
                                {{ $user->id }}
                            </td>
                            <td class="p-3">
                                {{ $user->code }}
                            </td>
                            <td class="p-3">
                                {{ $user->email }}
                            </td>
                            <td class="p-3">
                                {{ $user->mobile }}
                            </td>
                            <td class="p-3">
                                {{ $user->created_at }}
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
