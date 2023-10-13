@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.reports.patients.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">تقارير المرضي </li>
@stop
@section('content')
    @include('Hospital.pages.reports.patients.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.reports.patients.components.extends.repository.script')
@endsection
