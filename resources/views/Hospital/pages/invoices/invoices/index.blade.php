@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.invoices.invoices.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">الفواتير</li>
@stop
@section('content')
    @include('Hospital.pages.invoices.invoices.components.include.table')
    @include('Hospital.pages.invoices.invoices.components.include.edit')
    @include('Hospital.pages.invoices.invoices.components.include.pay')
@endsection
@section('script')
    @include('Hospital.pages.invoices.invoices.components.extends.repository.script')
@endsection
