@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.invoices.patients.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">فواتير المرضي</li>
@stop
@section('content')
    @include('Hospital.pages.invoices.patients.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.invoices.patients.components.extends.repository.script')
@endsection
