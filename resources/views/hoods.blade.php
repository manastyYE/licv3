@extends('layouts.admin',['name' => 'hoods'])
@section('title')
الاحساء السكنية
@endsection
@section("css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

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
