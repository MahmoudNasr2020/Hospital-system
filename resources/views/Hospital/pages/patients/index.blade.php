@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.patients.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">المرضي</li>
@stop
@section('content')
    @include('Hospital.pages.patients.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.patients.components.extends.repository.script')
@endsection
