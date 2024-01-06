@extends('layouts.admin')
@section('title')
    حافظة النظام الالي
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    {{--
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> --}}
@endsection
@section('contentheader')
    المنشأت
@endsection
@section('contentheaderlink')
    <a href="#الرابط الذي ينقل الصفحة الى المنشأت"> بيانات المنشأت </a>
@endsection
@section('contentheaderactive')
    الحافظة الالية
@endsection
@section('content')
    <hr>
    <br>
    <div>
        @livewire('o-clip',['id'=>$id])
        {{-- <livewire:billboardsc> --}}
    </div>



    </div>
@endsection
@section('script')
    <script src="{{ asset('app.js') }}"></script>
@endsection
