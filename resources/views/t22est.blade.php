@extends('layouts.admin')
@section('title')
اضافة منشأة جديدة
@endsection
@section("css")


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