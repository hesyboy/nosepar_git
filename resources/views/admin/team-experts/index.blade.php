@extends('admin.layouts.master')

@section('content')


    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-sblack rounded-md">
                <i class="flex p-2 text-2xl  fi fi-rr-user bg-slate-800 text-white rounded-md"></i>
                <span class="font-bold"> مدیریت تخصص تیم ها     </span>
            </div>
            {{-- <div>
                <a href="{{ route('admin.experts.create') }}" class="py-2 px-4 rounded-md bg-slate-800 text-white">
                    جدید
                </a>
            </div> --}}
        </div>

        <div class="">

            <div>
                <table class="w-full rounded-md overflow-hidden">
                    <thead>
                        <tr class="text-right bg-slate-800 text-white">
                            <th class="p-3 font-thin w-12">
                                id
                            </th>
                            <th class="p-3 font-thin w-48">
                                 کاربر
                            </th>
                            <th class="p-3 font-thin">
                                 تحصص ها
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
                                <div class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white mb-1">
                                    {{ $team->name }}
                                </div>
                            </td>

                            <td>
                                @foreach ($team->teamExperts as $teamExpert)

                                <div class="flex gap-3 items-center mt-1">

                                    <div class="flex gap-2 items-center mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                        <span class="p-1 bg-white rounded-md">
                                            @if ($teamExpert->level==1)
                                                <img class="h-8 w-8" src="{{$teamExpert->expert->image1}}">
                                            @elseif ($teamExpert->level==2)
                                                <img class="h-8 w-8" src="{{$teamExpert->expert->image2}}">
                                            @elseif ($teamExpert->level==3)
                                                <img class="h-8 w-8" src="{{$teamExpert->expert->image3}}">
                                            @elseif ($teamExpert->level==4)
                                                <img class="h-8 w-8" src="{{$teamExpert->expert->image4}}">
                                            @elseif ($teamExpert->level==5)
                                                <img class="h-8 w-8" src="{{$teamExpert->expert->image5}}">
                                            @else
                                                <img class="h-8 w-8" src="{{$teamExpert->expert->image}}">
                                            @endif
                                        </span>
                                        <span>
                                            {{$teamExpert->expert->title}}
                                        </span>
                                        <span>
                                            |
                                        </span>
                                        <span>
                                           Level : ({{$teamExpert->level}})
                                        </span>
                                    </div>
                                    <div class="flex gap-3">
                                        <a href="{{route('admin.experts.teams.upgrade',$teamExpert->id)}}" class="py-1 px-2 bg-green-600 text-white rounded-md">Upgrade</a>
                                        <a href="{{route('admin.experts.teams.downgrade',$teamExpert->id)}}" class="py-1 px-2 bg-blue-600 text-white rounded-md">Downgrade</a>
                                        <a href="{{route('admin.experts.teams.delete',$teamExpert->id)}}" class="py-1 px-2 bg-red-600 text-white rounded-md">Delete</a>

                                    </div>
                                </div>

                                @endforeach
                            </td>


                            {{-- <td class="p-3 flex flex-col gap-2">
                                <a href="{{route('admin.experts.edit',$user->id)}}" class="w-full py-1 px-4 rounded-md bg-blue-600 text-white text-center">
                                    اصلاح
                                </a>
                                <form action="{{route('admin.experts.delete',$user->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="w-full px-4 py-1 bg-red-500 text-white rounded-md">
                                        حذف تخصص
                                    </button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


            </div>
        </div>



    </div>

@endsection
