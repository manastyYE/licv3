@extends('layouts.admin')
@section('title')
    تهئية النظام
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    {{--
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> --}}
@endsection
@section('contentheader')
    لوحة التحكم
@endsection
@section('contentheaderactive')
    تهئية النظام
@endsection

@section('content')
    <hr>
    <br>
    <div>
        <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3 xl:grid-cols-4 sm:gap-5 lg:gap-6">
            <a href="/admin/org_type">
                <div class="card">
                    <div class="flex justify-center p-5">
                        <img class="w-9/12" src="{{ asset('icons/add_shop.png') }}" alt="image">
                    </div>
                    <div class="px-4 pb-8 text-center sm:px-5">
                        <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            الانشطة التجارية
                        </h4>
                        <p class="pt-3">

                        </p>
                        {{-- <button
                        class="mt-8 font-medium text-white shadow-lg btn bg-primary shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">

                    </button> --}}
                    </div>
                </div>
            </a>
            <a href="/admin/billboards">
                <div class="card">
                    <div class="flex justify-center p-5">
                        <img class="w-9/12" src="{{ asset('icons/add_shop.png') }}" alt="image">
                    </div>
                    <div class="px-4 pb-8 text-center sm:px-5">
                        <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            اللوحات
                        </h4>
                        <p class="pt-3">

                        </p>
                        {{-- <button
                        class="mt-8 font-medium text-white shadow-lg btn bg-primary shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">

                    </button> --}}
                    </div>
                </div>
            </a>
            <a href="/admin/hoods">
                <div class="card">
                    <div class="flex justify-center p-5">
                        <img class="w-9/12" src="{{ asset('icons/add_shop.png') }}" alt="image">
                    </div>
                    <div class="px-4 pb-8 text-center sm:px-5">
                        <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            الاحياء
                        </h4>
                        <p class="pt-3">

                        </p>
                        {{-- <button
                        class="mt-8 font-medium text-white shadow-lg btn bg-primary shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">

                    </button> --}}
                    </div>
                </div>
            </a>

            <a href="/admin/users">
                <div class="card">
                    <div class="flex justify-center p-5">
                        <img class="w-9/12" src="{{asset('icons/usericon.png')}}" alt="users icon">
                    </div>
                    <div class="px-4 pb-8 text-center sm:px-5">
                        <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            المستخدمين
                        </h4>
                        <p class="pt-3">

                        </p>

                    </div>
                </div>
            </a>


            <a href="/admin/office">
                <div class="card">
                    <div class="flex justify-center p-5">
                        <img class="w-9/12" src="{{ asset('icons/add_shop.png') }}" alt="image">
                    </div>
                    <div class="px-4 pb-8 text-center sm:px-5">
                        <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            القطاعات
                        </h4>
                        <p class="pt-3">

                        </p>
                        {{-- <button
                        class="mt-8 font-medium text-white shadow-lg btn bg-primary shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">

                    </button> --}}
                    </div>
                </div>
            </a>
            <a href="/admin/hood_unit">
                <div class="card">
                    <div class="flex justify-center p-5">
                        <img class="w-9/12" src="{{ asset('icons/add_shop.png') }}" alt="image">
                    </div>
                    <div class="px-4 pb-8 text-center sm:px-5">
                        <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            وحدات الجوار
                        </h4>
                        <p class="pt-3">

                        </p>
                        {{-- <button
                        class="mt-8 font-medium text-white shadow-lg btn bg-primary shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">

                    </button> --}}
                    </div>
                </div>
            </a>
            <a href="/admin/building">
                <div class="card">
                    <div class="flex justify-center p-5">
                        <img class="w-9/12" src="{{ asset('icons/add_shop.png') }}" alt="image">
                    </div>
                    <div class="px-4 pb-8 text-center sm:px-5">
                        <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                            انواع البناء
                        </h4>
                        <p class="pt-3">

                        </p>
                        {{-- <button
                        class="mt-8 font-medium text-white shadow-lg btn bg-primary shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">

                    </button> --}}
                    </div>
                </div>
            </a>
        </div>
        {{-- @livewire('users') --}}
        {{-- <livewire:users> --}}
    </div>



    </div>
@endsection
@section('script')
    <script src="{{ asset('app.js') }}"></script>
@endsection
