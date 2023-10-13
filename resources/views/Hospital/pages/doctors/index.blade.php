@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.doctors.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">الدكاترة</li>
@stop
@section('content')
    @include('Hospital.pages.doctors.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.doctors.components.extends.repository.script')
@endsection
