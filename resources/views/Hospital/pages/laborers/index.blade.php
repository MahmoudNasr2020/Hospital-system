@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.laborers.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">العمال</li>
@stop
@section('content')
    @include('Hospital.pages.laborers.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.laborers.components.extends.repository.script')
@endsection
