<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.headtags')
@yield('headtags')

<body dir="rtl"  data-theme="light" class="h-screen">
    <div class="bg-slate-100 text-sm flex flex-col h-full relative">

        <div class="w-full flex" x-data="{menu:false}">
            <div class=" bg-white h-screen" :class="menu ? 'w-[350px]' : 'w-[80px]' ">
                @include('admin.layouts.sidebar')
            </div>
            <div class="w-full">
                <div>
                    @include('admin.layouts.header')
                </div>
                <div class="p-3">
                    <div class="">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
        {{-- <div class="fixed bottom-0 w-full">
            @include('admin.layouts.footer')
        </div> --}}

    </div>

    @include('admin.layouts.scripts')
    @yield('scripts')
</body>
</html>
