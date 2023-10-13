@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.admins.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">المسؤولين</li>
    <li class="breadcrumb-item">اضافة مسؤول</li>
@stop
@section('content')
    @include('Hospital.pages.admins.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.admins.components.extends.repository.script')
@endsection
