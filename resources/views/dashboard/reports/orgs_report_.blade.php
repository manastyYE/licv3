@extends('layouts.admin')
@section('title')
تقارير المنشأت
@endsection
@section("css")
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> --}}
{{--
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> --}}
@endsection
@section('contentheader')
لوحة التحكم
@endsection
@section('contentheaderlink')
<a href="#الرابط الذي ينقل الصفحة الى المنشأت"> التقارير   </a>
@endsection
@section('contentheaderactive')
تقارير المنشأت
@endsection
@section('content')
<hr>
<br>
<div>
    @livewire('report.orgs-report')
    {{-- <livewire:billboardsc> --}}
</div>



</div>
@endsection
@section("script")

<script src="{{ asset('app.js') }}"></script>


@endsection
