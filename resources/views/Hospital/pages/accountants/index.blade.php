@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.accountants.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">المحاسبين</li>
@stop
@section('content')
    @include('Hospital.pages.accountants.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.accountants.components.extends.repository.script')
@endsection
