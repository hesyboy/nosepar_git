<!DOCTYPE html>
<html lang="en">

@include('site.layouts.headtags')
@yield('headtags')

<body dir="rtl"  data-theme="light" class="h-screen">
    <div class="bg-white flex flex-col">
        <div>
            @include('site.layouts.header')
        </div>
        <div class="">
            @yield('content')
        </div>
        <div class="">
            @include('site.layouts.footer')
        </div>

    </div>

    @include('site.layouts.scripts')
    @yield('scripts')
</body>
</html>
