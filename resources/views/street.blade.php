@extends('layouts.admin',['name' => 'street'])
@section('title')
    قطاعات المنشأت
@endsection
@section("css")
    /*<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />*/
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-4Kx0m8Qy8dYhQc0Xe6aL8nWwOK0l25g/3Dm8jwTQ5a9vQH5v5f2H7XwZnL4R9t7fjZ4Zrj3C0yU5fRlN7aRfBQ==" crossorigin="anonymous" />
@endsection
@section('contentheader')
    الادارة
@endsection

@section('contentheaderactive')
    قطاعات المنشأت
@endsection
@section('content')
    <hr >
    <br>
    <div>
        @livewire('streets')
    </div>



    </div>
@endsection
@section("script")




@endsection
