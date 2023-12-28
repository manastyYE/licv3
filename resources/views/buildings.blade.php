@extends('layouts.admin')
@section('title')
    انواع البناء
@endsection
@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> --}}
@endsection
@section('contentheader')
    الادارة
@endsection
@section('contentheaderlink')
    <a href="#الرابط الذي ينقل الصفحة الى المنشأت">  نوع البناء </a>
@endsection
@section('contentheaderactive')
    بيانات انواع المباني
@endsection
@section('content')
    <hr>
    <br>
    <div>
        @livewire('buildings')
    </div>



    </div>
@endsection
@section('script')
@endsection
