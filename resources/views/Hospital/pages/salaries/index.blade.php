@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.salaries.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item"> الرواتب </li>
@stop
@section('content')
    @include('Hospital.pages.salaries.components.include.index')
    @include('Hospital.pages.salaries.components.include.table')
    @include('Hospital.pages.salaries.components.include.pay')
@endsection
@section('script')
    @include('Hospital.pages.salaries.components.extends.repository.script')
@endsection
