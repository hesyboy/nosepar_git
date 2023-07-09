<div>


@include('panel.layouts.notification')



    <div class="flex flex-col gap-5" x-data="{'tab':'tab0'}">


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
                        مساله ها
                    </a>
                </li>
                <li>
                    <span>
                        >
                    </span>
                </li>
                <li>
                    <a href="" class="text-blue-600 font-bold">
                        {{$challenge->title}}
                    </a>
                </li>

            </ul>
        </div>

        <div class="flex items-start justify-between py-10 px-20 bg-slate-800 text-slate-50 rounded-md" >
            <div class="flex flex-col gap-5">
                <div class="text-3xl">
                    حل چالش
                </div>
                <div class="text-4xl">
                    {{$challenge->title}}
                </div>
                <div class="text-xl mt-8">
                    جوایز : {{$challenge->award}}
                </div>
                <div class="text-xl">
                    تا تاریخ :
                    {{$challenge->end_date}}
                </div>
            </div>
        </div>

        <div class="bg-white rounded-md shadow " >

            <div class="px-4 pt-2 text-sm border-t font-iranyekan-bold">
                <div class="flex items-center gap-8">
                    <span @click="tab='tab0'" class="pt-2 pb-3 border-b-4 cursor-pointer " :class="tab=='tab0' ? ' border-blue-500' : ' border-white' " >
                        دید کلی
                    </span>
                    <span @click="tab='tab1'" class="pt-2 pb-3 border-b-4 cursor-pointer " :class="tab=='tab1' ? ' border-blue-500' : ' border-white' ">
                        ثبت نام
                    </span>
                    <span @click="tab='tab2'" class="pt-2 pb-3 border-b-4 cursor-pointer " :class="tab=='tab2' ? ' border-blue-500' : ' border-white' ">
                        اسناد و داده ها
                    </span>
                    <span @click="tab='tab3'" class="pt-2 pb-3 border-b-4 cursor-pointer " :class="tab=='tab3' ? ' border-blue-500' : ' border-white' ">
                        ارسال پاسخ
                    </span>
                    <span @click="tab='tab4'" class="pt-2 pb-3 border-b-4 cursor-pointer " :class="tab=='tab4' ? ' border-blue-500' : ' border-white' ">
                        مشاهده نتیجه
                    </span>
                </div>
            </div>
        </div>

        <div>
            <div class="flex gap-5" x-show="tab=='tab0'">
                <div class="w-full md:w-2/3 flex flex-col gap-3 p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        توضیحات
                    </div>
                    <div>
                        {{-- {{$team->description}} --}}
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        نشان های مورد نیاز
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab1'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold my-1">
                        قوانین و مقررات
                    </div>
                    <div>
                        برای شرکت در حل چالش ابتدا باید قوانین و مقررات را مطالعه و موافقت نمایید
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab2'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        اسناد مساله
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5" x-show="tab=='tab3'">
                <div class="bg-indigo-100 p-2 rounded-md flex justify-between items-center text-indigo-600">
                    <span>
                        در کامیونیتی دیسکورد نوسپار پیرامون این چالش بحث و گفتگو کنید!
                    </span>
                    <a class="bg-indigo-600 text-white p-2 rounded-md" href="">
                        <span>
                            ورود به دیسکورد
                        </span>
                    </a>
                </div>

                <div class="bg-blue-100 p-3 rounded-md flex justify-between items-center text-blue-600">
                    <span>
                        5 سابمیشن دیگر تا تاریخ 12/3/1401 میتوانید ارسال کنید
                    </span>
                </div>


                <div class="p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        ارسال سابمیشن
                    </div>
                </div>
            </div>


            <div class="flex flex-col gap-5" x-show="tab=='tab4'">
                <div class="p-3 bg-white rounded-md shadow">
                    <div class="text-base font-iranyekan-bold">
                        وضعیت سابمیشن من
                    </div>
                </div>
            </div>
        </div>









    </div>
</div>
