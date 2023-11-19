@extends('layouts.admin')
@section('title')
عرض المنشأت
@endsection
@section("css")
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('app.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@endsection
@section('contentheader')
المنشأت
@endsection
@section('contentheaderlink')
<a href="#الرابط الذي ينقل الصفحة الى المنشأت"> المنشأت </a>
@endsection
@section('contentheaderactive')
عرض المنشأت
@endsection
@section('content')
<hr >
<br>
@livewire('show-orgs')
{{-- <livewire:org.add-org> --}}
</div>
@endsection
@section("script")

<script src="{{ asset('app.js') }}"></script>
<script  src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"> </script>
<script>
   //Initialize Select2 Elements
   $('.select2').select2({
     theme: 'bootstrap4'
   });
</script>

@endsection