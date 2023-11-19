@extends('layouts.admin')
@section('title')
اضافة منشأة جديدة
@endsection
@section("css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

@endsection
@section('contentheader')
المنشأت
@endsection
@section('contentheaderlink')
<a href="#الرابط الذي ينقل الصفحة الى المنشأت"> المنشأت </a>
@endsection
@section('contentheaderactive')
اضافة
@endsection
@section('content')
<hr >
<br>
<div>
  @livewire('opp-type-p')
</div>



</div>
@endsection
@section("script")




@endsection