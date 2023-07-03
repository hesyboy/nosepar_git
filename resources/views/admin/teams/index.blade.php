@extends('admin.layouts.master')

@section('content')


    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-sblack rounded-md">
                <i class="flex p-2 text-2xl  fi fi-rr-user bg-slate-800 text-white rounded-md"></i>
                <span class="font-bold"> مدیریت تیم ها    </span>
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
                                نام تیم
                            </th>
                            <th class="p-3 font-thin">
                                سازنده تیم
                            </th>
                            <th class="p-3 font-thin">
                                تخصص تیم
                            </th>
                            <th class="p-3 font-thin">
                                اعضا تیم
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
                        @foreach ($teams as $team)
                        <tr class="p-2 bg-white">
                            <td class="p-3">
                                    {{ $team->id }}
                            </td>
                            <td class="p-3">
                                <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                    {{ $team->name }}
                                </span>
                            </td>
                            <td class="p-3">
                                <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                    {{ $team->owner->first_name }} {{ $team->owner->last_name }}
                                </span>
                            </td>
                            <td class="p-3">
                                @foreach ($team->teamExperts as $teamExperts)
                                    <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                        {{ $teamExperts->expert->title}}
                                    </span>
                                @endforeach
                            </td>
                            <td class="p-3">
                                @foreach ($team->teamMembers as $teamMember)
                                    <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                        {{ $teamMember->User->first_name}} {{ $teamMember->User->last_name}}
                                    </span>
                                @endforeach
                            </td>
                            <td class="p-3">
                                <span class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                    {{ $team->created_at }}
                                </span>
                            </td>
                            <td class="p-3">
                                <form action="{{route('admin.teams.delete',$team->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="px-4 py-1 bg-red-500 text-white rounded-md">
                                        حذف تیم
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
