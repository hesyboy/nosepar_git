@extends('panel.layouts.master')

@section('content')


<div>
    @livewire('panel.account.index')
</div>
    {{-- <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-indigo-900 rounded-md">
                <i class="flex p-1 text-2xl  fi fi-rr-user-pen"></i>
                <span>تنظیمات حساب کاربری </span>
            </div>
        </div>

        @if ($errors->any())
            <div class="flex gap-1">
                @foreach ($errors->all() as $error)
                    <span class=" p-3 bg-red-100 rounded-md text-sm text-red-800">
                        {{ $error }}
                    </span>
                @endforeach
            </div>
        @endif

        <div class="flex items-center justify-between p-5 bg-white rounded-md">
            <form action="{{ route('panel.account.update') }}" method="post" class="flex flex-col gap-6">
                @csrf
                <div class="flex items-end gap-5">
                    <div class="flex flex-col gap-1">
                        <label for="">نام کاربری</label>
                        <input type="text" value="{{ auth()->user()->code }}" class="p-2 bg-slate-100 border rounded-md outline-none text-slate-500" disabled>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">ایمیل </label>
                        <input type="text" name="email" value="{{ auth()->user()->email }}" class="w-[300px] p-2 bg-slate-100 border rounded-md outline-none">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">شماره موبایل </label>
                        <input type="text" name="mobile" value="{{ auth()->user()->mobile }}" class="p-2 bg-slate-100 border rounded-md outline-none ">
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <div>
                        تنظیمات ارسال ایمیل
                    </div>
                    <div class="flex items-end gap-5 border p-1 rounded-md bg-slate-100">
                        <div>
                            <div class="form-control">
                                <label class="label cursor-pointer">
                                <span class="label-text px-2"> اطلاع از ایونت ها</span>
                                <input type="checkbox" name="receive_event" class="toggle toggle-primary"
                                    @if (auth()->user()->receive_event == 1)
                                        checked
                                    @else

                                    @endif
                                />
                                </label>
                            </div>
                        </div>
                        <div>
                            <div class="form-control">
                                <label class="label cursor-pointer">
                                  <span class="label-text px-2">درخواست عضویت در تیم </span>
                                  <input type="checkbox" name="receive_team_request" class="toggle toggle-primary"
                                    @if (auth()->user()->receive_team_request == 1)
                                        checked
                                    @else

                                    @endif
                                  />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex items-center gap-1 bg-indigo-900 hover:bg-indigo-800 duration-200 text-white p-3 rounded-md ">ثبت تغییرات</button>
                </div>
            </form>
        </div>

    </div> --}}

@endsection
