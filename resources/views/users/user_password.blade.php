@extends('layouts.admin')
@section('title')
اعدادات الحماية
@endsection
@section("css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> --}}
@endsection
@section('contentheader')
الاعدادات
@endsection
@section('contentheaderlink')
<a href="#الرابط الذي ينقل الصفحة الى المنشأت"> اعدادات الحساب </a>
@endsection
@section('contentheaderactive')
الحماية وكلمة المرور
@endsection
@section('content')
<hr >
<br>
<div>
  @livewire('users.security')
  {{-- <livewire:users> --}}
</div>



</div>
@endsection
@section("script")

<script src="{{ asset('app.js') }}"></script>


@endsection
