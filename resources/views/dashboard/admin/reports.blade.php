@extends('layouts.admin',['name' => 'dashboard'])
@section('title')
لوحة التحكم
@endsection
@section("css")
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> --}}
{{--
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> --}}
@endsection
@section('contentheader')
لوحة التحكم
@endsection
@section('contentheaderactive')
التقارير
@endsection
@section('content')
<hr>
<br>
<div>
    <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-4 sm:gap-5 lg:gap-6">
        <a href="/admin/report/orgs">
            <div class="card">
                <div class="flex justify-center p-5">
                    <img class="w-9/12" src="{{asset('icons/institution.png')}}" alt="image">
                </div>
                <div class="px-4 pb-8 text-center sm:px-5">
                    <h4 class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                        تقارير المنشأت
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
@section("script")

<script src="{{ asset('app.js') }}"></script>


@endsection
