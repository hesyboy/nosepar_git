<!DOCTYPE html>
<html lang="en"   data-theme="light">

@include('panel.layouts.headtags')
@yield('headtags')

<body dir="rtl" class="">
    <div class="w-full h-full text-sm bg-slate-50">

        {{-- @mouseover="menu=true" @mouseover.away="menu=false" --}}

        <div class="relative w-screen " x-data="{menu:false}">
            <div class="z-50 fixed -right-2 md:right-0 top-0 h-full" :class="menu ? 'w-[350px]' : 'w-[80px]' " >
                <div class=" h-full bg-white" :class="menu ? 'w-[300px]' : 'w-[80px]' ">
                    @include('panel.layouts.sidebar')
                </div>
            </div>

            <div class="w-full flex flex-col items-cener pr-[75px]" >
                <div class="">
                    @include('panel.layouts.header')
                </div>
                <div class="px-3 py-3">
                    <div class="">
                        @yield('content')
                    </div>
                </div>

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
