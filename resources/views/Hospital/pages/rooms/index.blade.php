@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.rooms.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item"> الغرف </li>
@stop
@section('content')
    @include('Hospital.pages.rooms.components.include.table')
    @include('Hospital.pages.rooms.components.include.add')
    @include('Hospital.pages.rooms.components.include.show')
    @include('Hospital.pages.rooms.components.include.update')
@endsection
@section('script')
    @include('Hospital.pages.rooms.components.extends.repository.script')
@endsection
