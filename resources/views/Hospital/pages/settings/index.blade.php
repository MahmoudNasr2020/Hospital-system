@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.settings.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item"> الاعدادت </li>
@stop
@section('content')
    @include('Hospital.pages.settings.components.include.edit')
@endsection
@section('script')
    @include('Hospital.pages.settings.components.extends.repository.script')
@endsection
