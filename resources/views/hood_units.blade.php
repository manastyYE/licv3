@extends('layouts.admin')
@section('title')
    وحدات الجوار
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@endsection
@section('contentheader')
    الادارة
@endsection
@section('contentheaderlink')
    <a href="#الرابط الذي ينقل الصفحة الى المنشأت"> وحدات الجوار </a>
@endsection
@section('contentheaderactive')
    بيانات وحدات الجوار
@endsection
@section('content')
    <hr>
    <br>
    <div>
        @livewire('hood-units')
    </div>



    </div>
@endsection
@section('script')
@endsection
