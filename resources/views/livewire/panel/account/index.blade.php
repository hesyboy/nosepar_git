<div>



    @include('panel.layouts.notification')



    <div class="flex flex-col gap-5" x-data="{'tab':'tab0'}">


        <div>
            <ul class="flex items-center gap-2 ">
                <li>
                    <a href="{{route('site.index')}}" class="text-slate-500 hover:text-slate-700 hover:font-bold">
                        خانه
                    </a>
                </li>
                <li>
                    <span>
                        >
                    </span>
                </li>
                <li>
                    <a href="{{route('panel.teams.index')}}" class="text-slate-500 hover:text-slate-700 hover:font-bold">
                        تیم ها
                    </a>
                </li>
                <li>
                    <span>
                        >
                    </span>
                </li>
                <li>
                    <a href="" class="text-blue-600 font-bold">
                        متخصص {{$user->first_name}} {{$user->last_name}}
                    </a>
                </li>

            </ul>
        </div>

        <div class="bg-white rounded-md shadow " >
            <div class="flex items-start justify-between p-4">
                <div class="flex flex-col gap-5">
                    <div class="flex items-center gap-4 py-1">
                        <div>
                            <img src="{{ asset($user->profile_image) }}" alt="" class="w-24 h-24 rounded-md">
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-5">
                                <h2 class="text-xl font-iranyekan-bold">
                                    {{$user->first_name}} {{$user->last_name}}
                                </h2>
                                {{-- <h3 class="text-base ">
                                    {{$team->title}}
                                </h3> --}}
                            </div>
                            <div class="flex gap-3">
                                @foreach ($user->userExperts as $userExpert)
                                    <div x-data="{popup:false}" @mouseover="popup=true" @mouseleave="popup=false"
                                        class="relative flex items-center bg-white justify-center  text-xs text-white uppercase  rounded-md overflow-hidden cursor-pointer h-10 w-10  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                        {{-- <img class="" src="{{asset($userExpert->expert->image)}}" alt="" > --}}
                                        @if ($userExpert->level==1)
                                        <img class="h-8 w-8 rounded-full" src="{{$userExpert->expert->image1}}">
                                        @elseif ($userExpert->level==2)
                                            <img class="h-8 w-8 rounded-full" src="{{$userExpert->expert->image2}}">
                                        @elseif ($userExpert->level==3)
                                            <img class="h-8 w-8 rounded-full" src="{{$userExpert->expert->image3}}">
                                        @elseif ($userExpert->level==4)
                                            <img class="h-8 w-8 rounded-full" src="{{$userExpert->expert->image4}}">
                                        @elseif ($userExpert->level==5)
                                            <img class="h-8 w-8 rounded-full" src="{{$userExpert->expert->image5}}">
                                        @else
                                            <img class="h-8 w-8 rounded-full" src="{{$userExpert->expert->image}}">
                                        @endif
                                        <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                            {{$userExpert->expert->title}}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div>
                        <div class="flex justify-start gap-5 px-2">
                            @if ($user->kaggle)
                                <a href="http://{{$user->kaggle}}">
                                    <img src="{{asset('assets/images/telegram-blue.png')}}" alt="" class="w-7 h-7">
                                </a>
                            @endif
                            @if ($user->linkedin)
                                <a href="http://{{$user->linkedin}}">
                                    <img src="{{asset('assets/images/linkdin-blue.png')}}" alt="" class="w-7 h-7">
                                </a>
                            @endif
                            @if ($user->github)
                                <a href="http://{{$user->github}}">
                                    <img src="{{asset('assets/images/github-blue.png')}}" alt="" class="w-7 h-7">
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="">
                        <span class="font-iranyekan-reqular">
                            {{ Str::limit($user->description, 60) }}
                        </span>
                    </div>
                </div>
                <div class="flex gap-3">



                </div>
            </div>

        </div>
        <div class="grid grid-cols-5 gap-5">

            <div class="col-span-3 flex flex-col gap-5">

                <div class="bg-white rounded-md shadow p-5 ">
                    <div  class=" flex flex-col justify-between gap-5">
                        <div>
                            <div class="font-iranyekan-bold text-base text-black mb-5">
                              اطلاعات کلی
                            </div>
                            <div class="mb-3">
                                @error('first_name')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('last_name')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('job_title')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('description')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('profile_image')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror

                            </div>
                            <form action="" class="flex flex-col gap-3">

                                <div class="grid grid-cols-2 gap-3">
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="flex flex-col gap-2">
                                            <span>نام  </span>
                                            <input type="text" wire:model="first_name"
                                             class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                            placeholder="نام تیم را وارد کنید">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <span>نام خانوادگی  </span>
                                            <input type="text" wire:model="last_name"
                                             class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                            placeholder="نام تیم را وارد کنید">
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <span>عنوان شغلی  </span>
                                        <input type="text" wire:model="job_title" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                        placeholder="عنوان شغلی را وارد کنید">
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col gap-2">
                                        <span>توضیحات</span>
                                        <textarea type="text" wire:model="description" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right" placeholder="توضیحات"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col gap-2" wire:                                x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                    >
                                        <span>تصویر پروفایل</span>
                                        <label class=" w-full p-3 rounded-md border-2 border-dashed border-blue-500 outline-blue-600 text-sm text-right cursor-pointer">
                                            <input type="file" wire:model="profile_image" class="hidden">
                                            <div class="flex gap-3 ">
                                                @if (!$profile_image)
                                                    <img src="{{ asset($user->profile_image) }}" class="h-14 rounded-md">
                                                @else
                                                    <img src="{{ $profile_image->temporaryUrl() }}" class="h-14 rounded-md">
                                                @endif
                                            </div>

                                        </label>
                                        <div x-show="isUploading" x-cloak>
                                            <progress class="w-full rounded-md overflow-hidden" max="100" x-bind:value="progress">
                                            </progress>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div>
                                    <div class="flex flex-col gap-2">
                                        <span>تصویر کاور</span>
                                        <label class=" w-full p-3 rounded-md border-2 border-dashed border-blue-500 outline-blue-600 text-sm text-right cursor-pointer">
                                            <input type="file" wire:model="cover_image" class="hidden">
                                            <div class="flex gap-3 ">
                                                @if (!$cover_image)
                                                    <img src="{{ asset($user->cover_image) }}" class="h-14 rounded-md">
                                                @else
                                                    <img src="{{ $cover_image->temporaryUrl() }}" class="h-14 rounded-md">
                                                @endif
                                            </div>
                                        </label>

                                    </div>
                                </div> --}}

                            </form>
                        </div>
                        <div class="flex justify-between items-center">

                            <div class="flex gap-3 items-center mt-3">

                                <div wire:click="save1" class="px-6 py-4 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                                    ثبت و بروز رسانی
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-md shadow p-5 ">
                    <div  class=" flex flex-col justify-between gap-5">
                        <div>
                            <div class="font-iranyekan-bold text-base text-black mb-5">
                               شبکه های اجتماعی
                            </div>
                            <div class="mb-3">

                            </div>
                            <form action="" class="flex flex-col gap-3">

                                <div class="">
                                    <div class="grid grid-cols-1 gap-3">
                                        <div class="w-full flex flex-col gap-2">
                                            <span>
                                                آدرس لینکدین (اختیاری)
                                            </span>
                                            <input type="text" wire:model="linkedin" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                            placeholder="آدرس  را وارد کنید">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <span>
                                                آدرس گیت هاب (اختیاری)
                                            </span>
                                            <input type="text" wire:model="github" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                            placeholder="آدرس را وارد کنید">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <span>
                                                آدرس Kaggle  (اختیاری)
                                            </span>
                                            <input type="text" wire:model="kaggle" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                            placeholder="آدرس را وارد کنید">
                                        </div>
                                    </div>

                                </div>


                            </form>
                        </div>
                        <div class="flex justify-between items-center">

                            <div class="flex gap-3 items-center mt-3">

                                <div wire:click="save3" class="px-6 py-4 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                                    ثبت و بروز رسانی
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-md shadow p-5 ">
                    <div  class=" flex flex-col justify-between gap-5">
                        <div>
                            <div class="font-iranyekan-bold text-base text-black mb-5">
                               تخصص ها
                            </div>
                            <div class="mb-3">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="text-red-500">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="flex flex-col gap-1 text-xs"  >
                                <span>
                                    انتخاب تخصص ها
                                </span>
                                <input type="text" placeholder="جستجو در میان تخصص ها " wire:model="expertSearch"
                                class="w-full px-3 py-3 rounded-md border border-gray-300 outline-blue-600 text-xs text-right">
                                <div class="grid grid-cols-3 gap-2 w-full pt-1   outline-blue-600 text-xs">
                                    @foreach ($experts as $key=>$expert)
                                        <div class="px-2 py-1 rounded-md border  hover:bg-gray-100
                                        @if (in_array($expert->id,$selectedExperts))
                                            bg-blue-50 border-blue-400
                                        @else
                                            border-gray-300
                                        @endif
                                        ">


                                            <div class="">
                                                {{-- <input type="checkbox" wire:model="userMemberSelector.{{$key}}" value="{{$expert->id}}" class="hidden checkbox h-5 w-5 bg-white" > --}}
                                                <div class="flex justify-between gap-1 items-center text-blue-600 text-xs mb-2">
                                                    <img class="h-7 w-7 rounded-full" src="{{asset($expert->image)}}" alt="">
                                                    <div class="flex gap-1">
                                                        @if (in_array($expert->id,$selectedExperts))

                                                            <label class="cursor-pointer">
                                                                <img src="{{ asset('assets/images/icons8_upload.svg') }}" alt="">
                                                                <input type="file" multiple class="hidden">
                                                            </label>
                                                            <span wire:click="removeUserExpret({{ $expert->id }})" class="cursor-pointer">
                                                                <img src="{{ asset('assets/images/icons_close.svg') }}" alt="">
                                                            </span>
                                                        @else
                                                            <span wire:click="addUserExpret({{ $expert->id }})">
                                                                <img src="{{ asset('assets/images/icons_select.svg') }}" alt="">
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="break-all max-w-max">
                                                    <p class="">{{$expert->title}} </p>
                                                </div>


                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="flex flex-col gap-1 mt-3">
                                    @foreach ($experts as $key=>$expert)
                                        @if (in_array($expert->id,$selectedExperts))
                                            <div class="w-full flex justify-between items-center p-3 rounded text-xs border-2">
                                                <div>
                                                    {{$expert->title}}
                                                </div>
                                                <div class="flex gap-1">
                                                    <span wire:click="removeUserExpret({{ $expert->id }})" class="cursor-pointer bg-blue-100 rounded-md py-1 px-2 text-blue-600">
                                                        مشاهده
                                                    </span>
                                                    <span wire:click="removeUserExpret({{ $expert->id }})" class="cursor-pointer bg-red-100 rounded-md py-1 px-2 text-red-600">
                                                        حذف
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                {{-- <div class="flex gap-3">
                                    @foreach ($userMemberSelector as $userselected)
                                        @if ($userselected)
                                            <div class="py-2 px-3 rounded text-xs bg-blue-100 text-blue-700">
                                                {{App\Models\User::find($userselected)->first_name}} {{App\Models\User::find($userselected)->last_name}}
                                            </div>
                                        @endif
                                    @endforeach
                                </div> --}}
                            </div>
                        </div>
                        <div class="flex justify-between items-center">

                            <div class="flex gap-3 items-center mt-3">

                                <div wire:click="save4" class="px-6 py-3 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                                    ثبت و بروز رسانی
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-data="{toggle:false}" class="cursor-pointer flex justify-center text-sm bg-red-100 hover:bg-red-200 text-red-600 font-bold rounded-md shadow p-3 ">
                    <span @click="toggle=true" x-show="!toggle">
                        حذف حساب کاربری
                    </span>
                    <span x-show="toggle" x-cloak  wire:click="delete()">
                        برای حذف حساب دوباره اینجا کلیک کنید
                    </span>
                    <span x-show="toggle" @click="toggle=false" x-cloak class="px-2 text-slate-800">
                        منصرف شدم
                    </span>
                </div>

            </div>

            <div class="col-span-2 flex flex-col gap-5" >

                {{-- <div class="flex items-center justify-between p-3 text-blue-800 bg-blue-100 rounded-md">
                    <div class="text-base font-iranyekan-bold">
                        پروفایل خود را فعال کنید!
                    </div>

                    <div x-data="{modal:false}">
                        <div class="px-6 py-2 text-base text-white bg-blue-600 rounded-md cursor-pointer font-iranyekan-regular hover:bg-blue-700" @click="modal=true">
                            <span>
                                فعال سازی پروفایل
                            </span>
                        </div>

                    </div>
                </div> --}}

                <div class="bg-white rounded-md shadow p-5 ">
                    <div  class=" flex flex-col justify-between gap-5">
                        <div>
                            <div class="font-iranyekan-bold text-base text-black mb-5">
                              اطلاعات کاربری
                            </div>
                            <div class="mb-3">
                                @error('email')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('mobile')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('password')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <form action="" class="flex flex-col gap-3">

                                <div class="">
                                    <div class="grid grid-cols-1 gap-3">
                                        <div class="w-full flex flex-col gap-2">
                                            <span>ایمیل  </span>
                                            <input type="text" wire:model="email" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                            placeholder=" ایمیل کاربری را وارد کنید">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <span>نامشماره تماس</span>
                                            <input type="text" wire:model="mobile" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                            placeholder="شماره همراه  را وارد کنید">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <span>رمز عبور   </span>
                                            <input type="password" wire:model="password" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                            placeholder="رمز عبور جدید را وارد کنید">
                                        </div>
                                    </div>

                                </div>


                            </form>
                        </div>
                        <div class="flex justify-between items-center">

                            <div class="flex gap-3 items-center mt-3">

                                <div wire:click="save2" class="px-6 py-3 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                                    ثبت و بروز رسانی
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
