@extends('layouts.admin')
@section('title')
قطاعات المنشأت
@endsection
@section("css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

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
    @livewire('office')
</div>



</div>
@endsection
@section("script")




@endsection
