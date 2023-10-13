@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.receptionists.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">موظفي الاستقبال</li>
@stop
@section('content')
    @include('Hospital.pages.receptionists.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.receptionists.components.extends.repository.script')
@endsection
