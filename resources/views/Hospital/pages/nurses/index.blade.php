@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.nurses.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">الممرضين</li>
@stop
@section('content')
    @include('Hospital.pages.nurses.components.include.table')
@endsection
@section('script')
    @include('Hospital.pages.nurses.components.extends.repository.script')
@endsection
