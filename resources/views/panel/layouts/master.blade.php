<!DOCTYPE html>
<html lang="en"   data-theme="light">

@include('panel.layouts.headtags')
@yield('headtags')

<body dir="rtl" class="h-screen">
    <div class="relative flex flex-col h-full text-sm bg-slate-50">

        {{-- @mouseover="menu=true" @mouseover.away="menu=false" --}}

        <div class="flex w-full" x-data="{menu:true}">
            <div class="" :class="menu ? 'w-[350px]' : 'w-[80px]' " >
                <div class="fixed top-0 right-0 h-screen bg-white" :class="menu ? 'w-[300px]' : 'w-[80px]' ">
                    @include('panel.layouts.sidebar')
                </div>
            </div>

            <div class="w-full">
                <div class="">
                    @include('panel.layouts.header')
                </div>
                <div class="px-8 py-5">
                    <div class="">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>

        <div class="fixed left-0 flex items-start justify-center w-screen top-1">
            <div class="w-[500px]">
                @if (session('success'))
                    <div class="" x-data="{notify:true}">
                        <div class="" x-show="notify" x-transition>
                            <div class="flex items-center justify-between gap-3 p-2 text-sm text-white border-b border-gray-200 rounded-lg bg-emerald-800">
                                <div class="flex items-center gap-3 ">
                                    <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                                    <div class="">
                                        {{session('success')}}
                                    </div>
                                </div>
                                <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross" @click="notify=false"></i>
                            </div>
                        </div>
                    </div>
                @endif
                @if (session('warning'))
                <div class="" x-data="{notify:true}">
                    <div class="" x-show="notify" x-transition>
                        <div class="flex items-center justify-between gap-3 p-2 text-sm text-white bg-orange-600 border-b border-gray-200 rounded-lg">
                            <div class="flex items-center gap-3 ">
                                <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                                <div class="">
                                    {{session('warning')}}
                                </div>
                            </div>
                            <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross" @click="notify=false"></i>
                        </div>
                    </div>
                </div>
                @endif
                @if (session('danger'))
                <div class="" x-data="{notify:true}">
                    <div class="" x-show="notify" x-transition>
                        <div class="flex items-center justify-between gap-3 p-2 text-sm text-white bg-red-800 border-b border-gray-200 rounded-lg">
                            <div class="flex items-center gap-3 ">
                                <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                                <div class="">
                                    {{session('danger')}}
                                </div>
                            </div>
                            <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross" @click="notify=false"></i>
                        </div>
                    </div>
                </div>

                @endif

            </div>
        </div>


        <div class="fixed bottom-0 w-full">
            {{-- @include('panel.layouts.footer') --}}
        </div>

    </div>

    @include('panel.layouts.scripts')
    @yield('scripts')
</body>
</html>
