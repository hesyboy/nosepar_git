@extends('panel.layouts.master')

@section('content')


<div class="flex flex-col gap-5">


    <div class="">

        <div class="col-span-12 bg-white rounded-md shadow">
            <div class="flex items-center justify-between p-3 border-b font-iranyekan-bold" x-data="{modal:false}">
                <span class="text-lg">
                    چالش های شرکت شده توسط من
                </span>
                <div class="px-4 py-2 text-sm text-blue-800 bg-blue-100 rounded-md cursor-pointer hover:bg-blue-200" @click="modal=true">
                    <span>
                        ایجاد چالش جدید
                    </span>
                </div>
                <div class="fixed top-0 left-0 z-50 flex items-center justify-center w-screen h-screen bg-black/60" x-show="modal"  x-cloak x-transition.opacity>
                    <div class="p-5 bg-white shadow rounded-md w-[550px] " @click.away="modal=false">
                        درحال پیاده سازی ...
                    </div>
                </div>
            </div>
            <div class="z-0 grid grid-cols-2 gap-5 p-3 pb-5">

                @foreach ([1,2,3,4] as $item)
                    @livewire('panel.challenge.main-card')
                @endforeach

            </div>
        </div>

        <div  class="p-5 mt-3 bg-white rounded-md shadow ">
            <div>
                <span class="text-lg font-bold ">
                    همه چالش ها
                </span>
            </div>
            {{-- <div class="grid grid-cols-4 gap-5 pb-5 text-base text-slate-300">

                <div class="px-3 py-4 border rounded-lg">
                    جستجو
                </div>
                <div class="px-3 py-4 border rounded-lg">
                    فیلتر بر اساس جایزه
                </div>
                <div class="px-3 py-4 border rounded-lg">
                    فیلتر براساس وضعیت
                </div>
                <div class="px-3 py-4 border rounded-lg">
                    فیلتر براساس دسته ‌بندی
                </div>
            </div> --}}
            <div>
                <div class="z-0 grid grid-cols-4 gap-5">

                    @foreach ([1,2,3,4,5,6,7,8] as $item)
                        @livewire('panel.challenge.small-card')
                    @endforeach

                </div>
            </div>
        </div>


    </div>








</div>




    {{-- <div class="flex flex-col gap-3 mt-5">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-indigo-900 rounded-md">
                <i class="flex p-1 text-2xl fi fi-rr-users-alt"></i>
                <span> تیم های من     </span>
            </div>
            <div>
                <a href="{{ route('panel.teams.create') }}" class="px-4 py-2 text-white bg-indigo-900 rounded-md">
                    ساخت تیم جدید
                </a>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-5">
            @foreach ($myTeams as $team )
                <div class="flex flex-col gap-5 p-3 bg-white rounded-md">
                    <div class="flex justify-between">
                        <div class="text-base font-bold">
                            {{ $team->name }}
                        </div>
                        <div class="text-xs">
                            26 نفر
                        </div>
                    </div>
                    <div class="flex gap-1">
                        <div class="flex items-center justify-center bg-indigo-200 rounded-md h-7 w-7">A</div>
                        <div class="flex items-center justify-center rounded-md bg-slate-200 h-7 w-7">B</div>
                        <div class="flex items-center justify-center rounded-md bg-slate-200 h-7 w-7">C</div>
                    </div>
                    <div>
                        <div>
                            <a href="" class="px-2 py-1 text-xs text-white rounded-md bg-slate-800">خروج از تیم</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



    </div> --}}

@endsection
