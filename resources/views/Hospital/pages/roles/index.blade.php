@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.roles.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item"> الصلاحيات </li>
@stop
@section('content')
    @include('Hospital.pages.roles.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.roles.components.extends.repository.script')
@endsection
