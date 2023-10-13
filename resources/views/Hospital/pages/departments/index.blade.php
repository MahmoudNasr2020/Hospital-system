@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.departments.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">الاقسام</li>
@stop
@section('content')
    @include('Hospital.pages.departments.components.include.table')
    @include('Hospital.pages.departments.components.include.add')
    @include('Hospital.pages.departments.components.include.show')
    @include('Hospital.pages.departments.components.include.update')
@endsection
@section('script')
    @include('Hospital.pages.departments.components.extends.repository.script')
@endsection
