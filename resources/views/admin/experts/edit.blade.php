@extends('admin.layouts.master')

@section('content')


    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-between p-3 bg-white rounded-md">
            <div class="flex items-center gap-2 text-base text-sblack rounded-md">
                <i class="flex p-2 text-2xl  fi fi-rr-user bg-slate-800 text-white rounded-md"></i>
                <span class="font-bold"> اصلاح تخصص      </span>
            </div>
            <div>
                <a href="{{ route('admin.experts.index') }}" class="py-2 px-4 rounded-md bg-slate-800 text-white">
                    بازگشت
                </a>
            </div>
        </div>

        <div class="">


        @if ($errors->any())
            <div class="flex gap-1 mb-3">
                @foreach ($errors->all() as $error)
                    <span class=" p-3 bg-red-100 rounded-md text-sm text-red-800">
                        {{ $error }}
                    </span>
                @endforeach
            </div>
        @endif

        <div class="flex items-center justify-between p-5 bg-white rounded-md">
            <form action="{{ route('admin.experts.update',$expert->id) }}" method="post" class="flex flex-col gap-5" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="flex gap-5 items-center">
                <div class="flex items-end gap-5">

                    <div class="flex flex-col gap-1">
                        <label for="">عنوان تخصص تیم  </label>
                        <input type="text" name="title" value="{{$expert->title}}" class="p-2 bg-slate-100 border rounded-md outline-none">
                    </div>

                    <div class="p-2">
                        <input type="file" name="image" value="{{$expert->image}}">
                    </div>

                </div>

            </div>

            <div class="grid grid-cols-5 gap-3">
                <div class="p-2">
                    <label for="">level1</label>
                    <input type="file" name="image1" value="{{$expert->image1}}">
                </div>
                <div class="p-2">
                    <label for="">level2</label>
                    <input type="file" name="image2" value="{{$expert->image2}}">
                </div>
                <div class="p-2">
                    <label for="">level3</label>
                    <input type="file" name="image3" value="{{$expert->image3}}">
                </div>
                <div class="p-2">
                    <label for="">level4</label>
                    <input type="file" name="image4" value="{{$expert->image4}}">
                </div>
                <div class="p-2">
                    <label for="">level5</label>
                    <input type="file" name="image5" value="{{$expert->image5}}">
                </div>
            </div


                <div>
                    <button type="submit" class="flex items-center gap-1 bg-slate-900 hover:bg-slate-800 duration-200 text-white py-2 px-4 rounded-md ">اصلاح </button>
                </div>
            </form>
        </div>


            </div>
        </div>



    </div>

@endsection
