<div class="fixed left-0 flex items-center justify-center top-1 z-20 py-2 pr-16 w-screen">
    <div class="">
        @if (session('success'))
            <div class="" >
                <div class=""  >
                    <div class="w-full flex items-center justify-between gap-3 p-2 text-sm text-white border-b border-gray-200 rounded-lg bg-emerald-800">
                        <div class="flex items-center gap-3 ">
                            <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                            <div class="">
                                {{session('success')}}
                            </div>
                        </div>
                        <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross"></i>
                    </div>
                </div>
            </div>
        @endif
        @if (session('warning'))
        <div class="" >
            <div class=""  >
                <div class="flex items-center justify-between gap-3 p-2 text-sm text-white bg-orange-600 border-b border-gray-200 rounded-lg">
                    <div class="flex items-center gap-3 ">
                        <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                        <div class="">
                            {{session('warning')}}
                        </div>
                    </div>
                    <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross" ></i>
                </div>
            </div>
        </div>
        @endif
        @if (session('danger'))
        <div class="" >
            <div class="">
                <div class="flex items-center justify-between gap-3 p-2 text-sm text-white bg-red-800 border-b border-gray-200 rounded-lg">
                    <div class="flex items-center gap-3 ">
                        <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                        <div class="">
                            {{session('danger')}}
                        </div>
                    </div>
                    <i class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross" ></i>
                </div>
            </div>
        </div>

        @endif

    </div>
</div>
