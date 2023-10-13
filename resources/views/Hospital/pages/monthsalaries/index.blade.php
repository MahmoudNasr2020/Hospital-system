@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.monthsalaries.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">الرواتب</li>
@stop
@section('content')
    @include('Hospital.pages.monthsalaries.components.include.table')
    @include('Hospital.pages.monthsalaries.components.include.add')
    @include('Hospital.pages.monthsalaries.components.include.show')
    @include('Hospital.pages.monthsalaries.components.include.update')
@endsection
@section('script')
    @include('Hospital.pages.monthsalaries.components.extends.repository.script')
@endsection
