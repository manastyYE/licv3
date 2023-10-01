@extends('layouts.admin')
@section('title')
الاحساء السكنية
@endsection
@section("css")


@endsection
@section('contentheader')
الادارة
@endsection
@section('contentheaderlink')
<a href="#الرابط الذي ينقل الصفحة الى المنشأت"> الاحياء السكنية </a>
@endsection
@section('contentheaderactive')
بيانات الاحياء السكنية
@endsection
@section('content')
<hr >
<br>
<div>
  @livewire('hoods')
</div>



</div>
@endsection
@section("script")




@endsection