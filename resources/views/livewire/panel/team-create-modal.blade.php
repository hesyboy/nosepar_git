<div>
    <div class="">

        @if ($stepper==0)
            <div  class=" flex flex-col justify-between gap-5 text-xs">
                <div>
                    <div class="font-iranyekan-bold text-base text-black mb-5">
                        ایجاد تیم جدید
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
                    <form action="" class="flex flex-col gap-3">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="flex flex-col gap-2">
                                <span>نام تیم </span>
                                <input type="text" wire:model="name" class="w-full p-3 rounded-md border border-gray-400 outline-blue-600 text-xs text-right"
                                placeholder="نام تیم را وارد کنید">
                            </div>
                            <div class="flex flex-col gap-2">
                                <span>عنوان شغلی  </span>
                                <input type="text" wire:model="title" class="w-full p-3 rounded-md border border-gray-400 outline-blue-600 text-xs text-right"
                                placeholder="عنوان شغلی را وارد کنید">
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col gap-2">
                                <span>توضیحات</span>
                                <textarea type="text" rows="3" wire:model="description" class="w-full p-3 rounded-md border border-gray-400 outline-blue-600 text-xs text-right" placeholder="توضیحات"></textarea>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-5 justify-between">

                            <div>
                                <div class="flex flex-col gap-2">
                                    <span>تصویر پروفایل</span>
                                    <label class="w-28 h-28 flex items-center justify-center  p-2 rounded-md border-2 border-dashed border-gray-400 outline-blue-600 text-xs text-right cursor-pointer">
                                        <input type="file" wire:model="profile_image" class="hidden">
                                        <div class="flex gap-3 ">
                                            @if ($profile_image)
                                                <img src="{{ $profile_image->temporaryUrl() }}" class="h-24 w-24 rounded-md">
                                            @endif
                                        </div>
                                        @if (!$profile_image)
                                            <div class="w-full text-center text-slate-400">
                                                انتخاب تصاویر
                                            </div>
                                        @endif
                                    </label>
                                </div>
                            </div>
                            {{-- <div>
                                <div class="flex flex-col gap-2">
                                    <span>تصویر کاور</span>
                                    <label class=" w-64 h-28 flex items-center justify-center p-2 rounded-md border-2 border-dashed  border-gray-400 outline-blue-600 text-xs text-right cursor-pointer">
                                        <input type="file" wire:model="cover_image" class="hidden">
                                        <div class="flex gap-3 ">
                                            @if ($cover_image)
                                                <img src="{{ $cover_image->temporaryUrl() }}" class="h-24 w-60 rounded-md">
                                            @endif
                                        </div>
                                        @if (!$cover_image)
                                            <div class="w-full text-center text-slate-400">
                                                انتخاب تصاویر
                                            </div>
                                        @endif
                                    </label>

                                </div>
                            </div> --}}


                        </div>


                    </form>
                </div>
                <div class="flex justify-between items-center">
                    <div>

                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="px-6 py-3 font-iranyekan-bold text-red-800 bg-red-100 hover:bg-red-200 rounded-md cursor-pointer" @click="modal=false">
                            بیخیال
                        </div>
                        <div wire:click="step1" class="px-6 py-3 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                            مرحله بعد
                        </div>
                    </div>
                </div>
            </div>

        @elseif($stepper==1)
            <div  class=" flex flex-col justify-between gap-5 text-xs">
                <div>
                    <div class="font-iranyekan-bold text-base text-black mb-5">
                        ایجاد تیم جدید
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
                    <form action="" class="flex flex-col gap-3">

                        <div class="flex flex-col gap-2">
                            <span>
                                آدرس لینکدین (اختیاری)
                            </span>
                            <input type="text" class="w-full p-3 rounded-md border border-gray-400 outline-blue-600 text-xs text-right"
                            placeholder=" وارد کنید">
                        </div>

                        <div class="flex flex-col gap-2">
                            <span>
                                آدرس گیت هاب (اختیاری)
                            </span>
                            <input type="text" class="w-full p-3 rounded-md border border-gray-400 outline-blue-600 text-xs text-right"
                            placeholder=" وارد کنید">
                        </div>

                        <div class="flex flex-col gap-2">
                            <span>
                                آدرس kaggle (اختیاری)
                            </span>
                            <input type="text" class="w-full p-3 rounded-md border border-gray-400 outline-blue-600 text-xs text-right"
                            placeholder=" وارد کنید">
                        </div>




                    </form>
                </div>
                <div class="flex  justify-between items-center">
                    <div>
                        <div wire:click="previous_page" class="px-6 py-3 font-iranyekan-bold text-blue-800 bg-blue-100 hover:bg-blue-200 rounded-md cursor-pointer">
                            مرحله قبل
                        </div>
                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="px-6 py-3 font-iranyekan-bold text-red-800 bg-red-100 hover:bg-red-200 rounded-md cursor-pointer" @click="modal=false">
                            بیخیال
                        </div>
                        <div wire:click="step2" class="px-6 py-3 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                            مرحله بعد
                        </div>
                    </div>
                </div>
            </div>

        @elseif($stepper==2)
                <div  class=" flex flex-col justify-between gap-5">
                    <div>
                        <div class="font-iranyekan-bold text-base text-black mb-5">
                            ایجاد تیم جدید
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
                        <div  class="flex flex-col gap-5 text-xs">

                                <div class="flex flex-col gap-2">
                                    <span>
                                        دعوت از اعضای نوسپار
                                    </span>

                                    <div class="flex flex-col gap-1" x-data="{toggle:false}" @click.away="toggle=false">
                                        <input type="text" placeholder="نام متخصص جستوجو کنید" wire:model="userMember" @click="toggle=true"
                                        class="w-full px-3 py-3 rounded-md border border-gray-400 outline-blue-600 text-xs text-right">
                                        <div class="w-full h-[180px] overflow-y-scroll pt-1  rounded-md border border-gray-300 outline-blue-600 text-xs flex flex-col gap-1" x-cloak x-show="toggle">
                                            @foreach ($users as $key=>$user)
                                                <div class="px-3 py-1">
                                                    <label class="flex items-center gap-2">
                                                        <input type="checkbox" wire:model="userMemberSelector.{{$key}}" value="{{$user->id}}" class="checkbox h-5 w-5" >
                                                        <div class="flex gap-1 items-center">
                                                            <img src="{{asset($user->profile_image)}}" alt="" class="h-7 w-7 rounded-full">
                                                            <span>{{$user->first_name}} {{$user->last_name}}</span>
                                                        </div>

                                                    </label>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                        <div class="flex gap-3">
                                            @foreach ($userMemberSelector as $userselected)
                                                @if ($userselected)
                                                    <div class="py-2 px-3 rounded text-xs bg-blue-100 text-blue-700">
                                                        {{App\Models\User::find($userselected)->first_name}} {{App\Models\User::find($userselected)->last_name}}
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                                <div class="flex flex-col gap-2">

                                    <span>
                                        دعوت با ایمیل
                                    </span>

                                    <div class="w-full flex flex-col md:flex-row gap-3 items-center">
                                        <input type="text" wire:model="email_invite" placeholder="ایمیل گیرنده را وارد کنید" class="w-full px-3 py-3 rounded-md border border-gray-400 outline-blue-600 text-xs text-right">
                                        <span wire:click="addEmailInvite()" class="w-full md:w-48 py-3 px-3 font-iranyekan-regular text-blue-800 bg-blue-100 hover:bg-blue-200 rounded-md cursor-pointer text-xs text-center">
                                            افزودن ایمیل کاربر
                                        </span>
                                    </div>

                                    <div class="w-full  rounded-md  text-xs flex flex-col gap-1">
                                        @foreach ($email_invites as $key=>$item )
                                            <div class="w-full border rounded-md py-1 px-2 border-slate-300 flex items-center justify-between">
                                                <span>
                                                    {{$item}}
                                                </span>
                                                <span class="bg-red-100 text-xs text-red-500 py-1 px-2 rounded-md cursor-pointer" wire:click="removeEmailInvite({{$key}})">
                                                    حذف
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>


                                </div>





                        </div>
                    </div>
                    <div class="flex  justify-between items-center text-xs">
                        <div>
                            <div wire:click="previous_page" class="px-6 py-3 font-iranyekan-bold text-blue-800 bg-blue-100 hover:bg-blue-200 rounded-md cursor-pointer">
                                مرحله قبل
                            </div>
                        </div>
                        <div class="flex gap-3 items-center mt-3">
                            <div class="px-6 py-3 font-iranyekan-bold text-red-800 bg-red-100 hover:bg-red-200 rounded-md cursor-pointer" @click="modal=false">
                                بیخیال
                            </div>
                            <div wire:click="step3" class="px-6 py-3 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                                مرحله بعد
                            </div>
                        </div>
                    </div>
                </div>

        @elseif($stepper==3)

            <div  class=" flex flex-col justify-between gap-5">
                <div>
                    <div class="font-iranyekan-bold text-base text-black mb-5">
                        ایجاد تیم جدید
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

                    <div>

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
                                        <div class="flex items-center gap-2 justify-between">
                                            {{-- <input type="checkbox" wire:model="userMemberSelector.{{$key}}" value="{{$expert->id}}" class="hidden checkbox h-5 w-5 bg-white" > --}}
                                            <div class="w-full flex gap-1 items-center text-blue-600 text-xs">
                                                <img class="h-7 w-7 rounded-full" src="{{asset('/assets/images/default.jpg')}}" alt="">
                                                <span>{{$expert->title}} </span>
                                            </div>
                                            <div class="flex gap-1">

                                                {{-- <span>
                                                    U
                                                </span> --}}

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
                                    </div>

                                @endforeach
                            </div>

                        </div>

                        <div class="text-xs mt-5 flex flex-col gap-3">
                            <div>
                                {{-- مدارک هر تخصص انتخاب شده را از طریق کلیک روی ایکن --}}
                            </div>
                            <div>
                                {{-- @foreach ($selectedExperts as $item )
                                    <div class="px-2 py-2 border border-gray-300 rounded-md flex justify-between items-center">
                                        <div>
                                            dsfsdfdfs
                                        </div>
                                        <div class="flex gap-3">
                                            <span class="py-2 px-4 bg-red-100 text-red-600 rounded">
                                                حذف
                                            </span>
                                            <span  class="py-2 px-4 bg-blue-100 text-blue-600 rounded">
                                                مشاهده
                                            </span>
                                        </div>
                                    </div>
                                @endforeach --}}

                            </div>
                        </div>


                    </div>

                </div>
                <div class="flex justify-between items-center text-xs">
                    <div>
                        <div wire:click="previous_page" class="px-6 py-3 font-iranyekan-regular text-blue-800 bg-blue-100 hover:bg-blue-200 rounded-md cursor-pointer">
                            مرحله قبل
                        </div>
                    </div>
                    <div class="flex gap-3 items-center mt-3">
                        <div class="px-6 py-3 font-iranyekan-regular text-red-800 bg-red-100 hover:bg-red-200 rounded-md cursor-pointer" @click="modal=false">
                            بیخیال
                        </div>
                        <div wire:click="save" class="px-6 py-3 font-iranyekan-regular text-white bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">
                            اتمام
                        </div>
                    </div>
                </div>
            </div>



        @endif


    </div>
</div>
