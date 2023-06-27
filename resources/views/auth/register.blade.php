<x-guest-layout>

    <div class="grid grid-cols-1 md:grid-cols-2 h-screen " style="direction: rtl">


        <div class="bg-blue-700 px-20 pt-40 pb-10 text-right text-white hidden md:flex flex-col items-center justify-between"
        style="background-image: url('{{ asset('assets/images/login.png') }}');">
            <div class="flex flex-col gap-14">
                <div class="flex ">
                    <img src="http://127.0.0.1:8000/assets/images/aicrowd2.png" alt="" class="h-24">
                </div>
                <div class="flex flex-col gap-8">
                    <h2 class="text-4xl font-iranyekan-bold">
                        جمع سپاری پروژه های علم داده
                    </h2>
                    <p class="pl-20 text-lg leading-10 ">
                        ما کارشناسان و علاقه مندان به علم داده را قادر می سازیم تا به طور مشترک مشکلات دنیای واقعی را از طریق چالش ها حل کنند.
                    </p>
                </div>
            </div>
            <div class="w-full flex flex-col gap-5">
                <div class="flex gap-5 text-2xl">
                    <div>
                        <i class="fi fi-brands-github"></i>
                    </div>
                    <div>
                        <i class="fi fi-brands-linkedin"></i>
                    </div>
                    <div>
                        <i class="fi fi-brands-telegram"></i>
                    </div>
                </div>
                <div class="flex gap-1 text-base">
                    <span>
                        2023 -
                    </span>
                    <span>
                        تمامی حقوق برای سایت
                    </span>
                    <span>
                        AIcrowd.ir
                    </span>
                    <span>
                        محفوظ است
                    </span>
                </div>
            </div>
        </div>


       <div class="">
            @livewire('auth.register')
       </div>




    </div>

</x-guest-layout>
