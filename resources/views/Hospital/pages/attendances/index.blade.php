@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.attendances.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">الحضور</li>
@stop
@section('content')
    @include('Hospital.pages.attendances.components.include.index')
    @include('Hospital.pages.attendances.components.include.table')
    @include('Hospital.pages.attendances.components.include.pay')
@endsection
@section('script')
    @include('Hospital.pages.attendances.components.extends.repository.script')
@endsection
