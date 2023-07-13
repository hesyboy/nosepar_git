@extends('admin.layouts.master')

@section('content')


    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-sblack rounded-md">
                <i class="flex p-2 text-2xl  fi fi-rr-user bg-slate-800 text-white rounded-md"></i>
                <span class="font-bold"> مدیریت تخصص کاربران     </span>
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
                        @foreach ($users as $user)
                        <tr class="p-2 bg-white">
                            <td class="p-3">
                                {{-- <img class="h-14 w-14 rounded-md" src="{{$expert->image}}" alt=""> --}}
                                {{ $user->id }}
                            </td>
                            <td class="p-3">
                                <div class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white mb-1">
                                    {{ $user->email }}
                                </div>
                                <div class="mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                    user code : {{ $user->code }}
                                </div>
                            </td>

                            <td>
                                @foreach ($user->userExperts as $userExpert)

                                <div class="flex gap-3 items-center mt-1">

                                    <div class="flex gap-2 items-center mx-1 px-2 py-1 bg-slate-800 rounded-md text-white">
                                        <span class="p-1 bg-white rounded-md">
                                            @if ($userExpert->level==1)
                                                <img class="h-8 w-8" src="{{$userExpert->expert->image1}}">
                                            @elseif ($userExpert->level==2)
                                                <img class="h-8 w-8" src="{{$userExpert->expert->image2}}">
                                            @elseif ($userExpert->level==3)
                                                <img class="h-8 w-8" src="{{$userExpert->expert->image3}}">
                                            @elseif ($userExpert->level==4)
                                                <img class="h-8 w-8" src="{{$userExpert->expert->image4}}">
                                            @elseif ($userExpert->level==5)
                                                <img class="h-8 w-8" src="{{$userExpert->expert->image5}}">
                                            @else
                                                <img class="h-8 w-8" src="{{$userExpert->expert->image}}">
                                            @endif
                                        </span>
                                        <span>
                                            {{$userExpert->expert->title}}
                                        </span>
                                        <span>
                                            |
                                        </span>
                                        <span>
                                           Level : ({{$userExpert->level}})
                                        </span>
                                    </div>
                                    <div class="flex gap-3">
                                        <a href="{{route('admin.experts.users.upgrade',$userExpert->id)}}" class="py-1 px-2 bg-green-600 text-white rounded-md">Upgrade</a>
                                        <a href="{{route('admin.experts.users.downgrade',$userExpert->id)}}" class="py-1 px-2 bg-blue-600 text-white rounded-md">Downgrade</a>
                                        <a href="{{route('admin.experts.users.delete',$userExpert->id)}}" class="py-1 px-2 bg-red-600 text-white rounded-md">Delete</a>

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
