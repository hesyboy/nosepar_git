<div>


    @include('panel.layouts.notification')



    <div class="flex flex-col gap-5">


        <div>
            <ul class="flex items-center gap-1">
                <li>
                    <a href="">
                        خانه
                    </a>
                </li>
                <li>
                    <span>
                        >
                    </span>
                </li>
                <li>
                    <a href="">
                        تیم ها
                    </a>
                </li>

            </ul>
        </div>

        <div class="bg-white rounded-md shadow " >
            <div class="flex items-start justify-between p-4">
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-4 py-1">
                        <div>
                            <img src="{{ asset($team->profile_image) }}" alt="" class="w-20 h-20 rounded-md">
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-5">
                                <h2 class="text-xl font-iranyekan-bold">
                                    {{$team->name}}
                                </h2>
                                {{-- <h3 class="text-base ">
                                    {{$team->title}}
                                </h3> --}}
                            </div>
                            <div class="flex gap-1">
                                @foreach ($team->teamExperts as $teamExpert)
                                    <div x-data="{popup:false}" @mouseover="popup=true" @mouseleave="popup=false"
                                        class="relative flex items-center bg-white justify-center  text-xs text-white uppercase  rounded-full cursor-pointer h-10 w-10  hover:z-50 border-2 border-gray-200 hover:border-2 hover:border-blue-500">
                                        {{-- <img class="rounded-full" src="{{asset($teamExpert->expert->image)}}" alt="" > --}}
                                        @if ($teamExpert->level==1)
                                        <img class="h-8 w-8 rounded-full" src="{{$teamExpert->expert->image1}}">
                                        @elseif ($teamExpert->level==2)
                                            <img class="h-8 w-8 rounded-full" src="{{$teamExpert->expert->image2}}">
                                        @elseif ($teamExpert->level==3)
                                            <img class="h-8 w-8 rounded-full" src="{{$teamExpert->expert->image3}}">
                                        @elseif ($teamExpert->level==4)
                                            <img class="h-8 w-8 rounded-full" src="{{$teamExpert->expert->image4}}">
                                        @elseif ($teamExpert->level==5)
                                            <img class="h-8 w-8 rounded-full" src="{{$teamExpert->expert->image5}}">
                                        @else
                                            <img class="h-8 w-8 rounded-full" src="{{$teamExpert->expert->image}}">
                                        @endif
                                        <span class="absolute -top-7 text-white bg-blue-600 rounded px-2 py-0.5 w-max" x-show="popup">
                                            {{$teamExpert->expert->title}}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div>
                        <div class="flex justify-start gap-5 px-2">
                            @if ($team->kaggle)
                            <a href="http://{{$team->kaggle}}">
                                <img src="{{asset('assets/images/telegram-blue.png')}}" alt="" class="w-7 h-7">
                            </a>
                            @endif
                            @if ($team->linkedin)
                                <a href="http://{{$team->linkedin}}">
                                    <img src="{{asset('assets/images/linkdin-blue.png')}}" alt="" class="w-7 h-7">
                                </a>
                            @endif
                            @if ($team->github)
                                <a href="http://{{$team->github}}">
                                    <img src="{{asset('assets/images/github-blue.png')}}" alt="" class="w-7 h-7">
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="">
                        <span class="font-iranyekan-reqular">
                            {{ Str::limit($team->description, 60) }}
                        </span>
                    </div>
                </div>
                <div class="flex gap-3">

                </div>
            </div>

        </div>




        <div class="grid grid-cols-12 gap-5">

            <div class="col-span-12 md:col-span-8 flex flex-col gap-5 ">

                <div class=" bg-white rounded-md shadow h-[300px]">
                    <div class="flex items-center justify-between p-3 border-b font-iranyekan-bold" x-data="{modal:false}">
                        <span class="font-iranyekan-bold text-lg py-0.5">
                            مدیریت اعضا
                        </span>

                    </div>
                    <div>

                        <div>

                        </div>
                        <div class="w-full bg-white rounded-md">


                            <tbody>
                                @foreach ($members as $item)
                                    <div class="text-sm border-b font-iranyekan-bold hover:bg-slate-100 grid grid-cols-3 items-center">
                                        <div class="px-3 py-3">
                                            <a href="{{ route('panel.teams.show',$item->id) }}" class="flex items-center gap-5">
                                                <img src="{{ asset($item->user->profile_image) }}" class="w-12 h-12 rounded-full" alt="">
                                                <span class="font-bold">
                                                    {{$item->user->first_name}} {{$item->user->last_name}}
                                                </span>
                                            </a>
                                        </div>
                                        <div class="px-3 py-5">
                                            <div class="flex items-center gap-5 justify-center">



                                                @if($item->team->owner_id == $item->user->id )
                                                    <span class="text-blue-600">
                                                        مدیر و ایجاد کننده تیم
                                                    </span>
                                                @elseif($item->status == 1)
                                                    @if($item->role == 1  )
                                                        <span class="text-blue-600">
                                                            مدیر تیم
                                                        </span>
                                                    @else
                                                        <span>
                                                            عضو تیم
                                                        </span>
                                                    @endif
                                                @else


                                                <span>
                                                    در انتظار تایید
                                                </span>
                                                @endif


                                            </div>
                                        </div>

                                        <div class="px-3 py-5 flex items-center justify-end">
                                            <div class="flex gap-3 justify-end">
                                                {{-- <div class="flex justify-end gap-3">
                                                    @if($member->role == 1 )
                                                        <div class="px-8 py-2 text-sm text-white bg-blue-600 rounded-md cursor-pointer font-iranyekan-regular hover:bg-blue-700">
                                                            <span>
                                                                مدیریت تیم
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="px-8 py-2 text-sm text-white bg-blue-600 rounded-md cursor-pointer font-iranyekan-regular hover:bg-blue-700">
                                                            <span>
                                                                مشاهده تیم
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div> --}}
                                                @if($team->owner_id != $item->user->id)
                                                    @if($item->role == 1)
                                                        <div wire:click="downgradeAccess({{$item}})"
                                                         class="flex items-center justify-center px-4 py-2 text-sm bg-blue-100 text-blue-700 rounded-md cursor-pointer font-iranyekan-regular hover:bg-blue-200">
                                                            <span>
                                                                تغییر به عضو عادی
                                                            </span>
                                                        </div>
                                                    @elseif($item->status==1 && $item->role == 0)
                                                        <div wire:click="upgradeAccess({{$item}})"
                                                        class="flex items-center justify-center px-4 py-2 text-sm bg-blue-100 text-blue-700 rounded-md cursor-pointer font-iranyekan-regular hover:bg-blue-200">
                                                            <span>
                                                                ترفیع
                                                            </span>
                                                        </div>
                                                    @endif

                                                    @if ($item->status==0)
                                                        <div wire:click="acceptMember({{$item}})"
                                                        class="flex items-center justify-center px-4 py-2 text-sm bg-emerald-100 text-emerald-700 rounded-md cursor-pointer font-iranyekan-regular hover:bg-emerald-200">
                                                        <span>
                                                            تایید عضویت
                                                        </span>
                                                    </div>
                                                    @endif


                                                    <div wire:click="deleteMember({{$item}})"
                                                     class="flex items-center justify-center px-4 py-2 text-sm bg-red-100 text-red-700 rounded-md cursor-pointer font-iranyekan-regular hover:bg-red-200">
                                                        <span>
                                                            حذف
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </div>

                    </div>
                </div>

                <div class="bg-white rounded-md shadow p-5 ">
                    <div  class=" flex flex-col justify-between gap-5">
                        <div>
                            <div class="font-iranyekan-bold text-base text-black mb-5">
                              اطلاعات کلی
                            </div>
                            <div class="mb-3">

                                @error('name')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('title')
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
                                @error('cover_image')
                                    <div class="text-red-500">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <form action="" class="flex flex-col gap-3">

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="flex flex-col gap-2">
                                        <span>نام تیم  </span>
                                        <input type="text" wire:model="name"
                                         class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                        placeholder="نام تیم را وارد کنید">
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <span>شعار تیم   </span>
                                        <input type="text" wire:model="title" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right"
                                        placeholder="شعار تیم را وارد کنید">
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col gap-2">
                                        <span>توضیحات</span>
                                        <textarea type="text" wire:model="description" class="w-full p-4 rounded-md border border-gray-400 outline-blue-600 text-sm text-right" placeholder="توضیحات"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col gap-2"
                                    x-data="{ isUploading: false, progress: 0 }"
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
                                                    <img src="{{ asset($team->profile_image) }}" class="h-14 rounded-md">
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
                                                    <img src="{{ asset($team->cover_image) }}" class="h-14 rounded-md">
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

                                <div wire:click="save2" class="px-6 py-4 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
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
                                                            <span wire:click="removeTeamExpret({{ $expert->id }})" class="cursor-pointer">
                                                                <img src="{{ asset('assets/images/icons_close.svg') }}" alt="">
                                                            </span>
                                                        @else
                                                            <span wire:click="addTeamExpret({{ $expert->id }})">
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
                                                    <span wire:click="removeTeamExpret({{ $expert->id }})" class="cursor-pointer bg-blue-100 rounded-md py-1 px-2 text-blue-600">
                                                        مشاهده
                                                    </span>
                                                    <span wire:click="removeTeamExpret({{ $expert->id }})" class="cursor-pointer bg-red-100 rounded-md py-1 px-2 text-red-600">
                                                        حذف
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>


                            </div>
                        </div>
                        <div class="flex justify-between items-center">

                            <div class="flex gap-3 items-center mt-3">

                                <div wire:click="save3" class="px-6 py-3 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                                    ثبت و بروز رسانی
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-data="{toggle:false}" class="cursor-pointer flex justify-center text-sm bg-red-100 hover:bg-red-200 text-red-600 font-bold rounded-md shadow p-3 ">
                    <span @click="toggle=true" x-show="!toggle">
                        حذف تیم
                    </span>
                    <span x-show="toggle" x-cloak  wire:click="deleteTeam()">
                        برای حذف تیم دوباره اینجا کلیک کنید
                    </span>
                    <span x-show="toggle" @click="toggle=false" x-cloak class="px-2 text-slate-800">
                        منصرف شدم
                    </span>
                </div>

            </div>

            <div class="col-span-12 md:col-span-4 bg-white rounded-md shadow h-[300px]">
                <div class="flex items-center p-3 border-b ">
                    <span class="font-iranyekan-bold text-lg py-0.5">
                        اطلاعیه ها
                    </span>
                </div>

                <div class="h-[350px] overflow-y-auto">
                    <ul class="text-base border-b font-iranyekan-bold">
                        @foreach ([] as $i )
                            <li class="flex px-3 py-3 border-b">
                                <a href="{{route('panel.profile.show',$i->following->code)}}" class="flex py-2 items-center gap-5">
                                    <img src="{{ asset($i->following->profile_image) }}" class="w-12 rounded-full" alt="">
                                    <span>
                                         {{$i->following->first_name}} {{$i->following->last_name}}
                                    </span>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>







    </div>
</div>
