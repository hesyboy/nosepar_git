<div class="fixed top-0 left-0 w-full pr-20 z-40" x-data="{notif:true}" x-show="notif">
    <div class="">
        @if (session('success'))
            <div class="" >
                <div class=""  >
                    <div class="w-full flex items-center justify-between gap-3 p-4 text-sm text-white border-b border-gray-200 bg-emerald-800">
                        <div class="flex items-center gap-3 ">
                            <i class="flex p-1 text-2xl text-gray-800 bg-gray-100 rounded fi fi-rr-bell-ring"></i>
                            <div class="">
                                {{session('success')}}
                            </div>
                        </div>
                        <i @click="notif=false" class="flex px-2 text-lg text-gray-100 cursor-pointer fi fi-rr-cross"></i>
                    </div>
                </div>
            </div>
        @endif
        @if (session('warning'))
        <div class="" >
            <div class=""  >
                <div class="flex items-center justify-between gap-3 p-4 text-sm text-white bg-orange-600 border-b border-gray-200">
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
                <div class="flex items-center justify-between gap-3 p-4 text-sm text-white bg-red-800 border-b border-gray-200">
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
