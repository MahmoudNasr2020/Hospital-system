@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.assign_rooms.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">تسجيل غرف المرضي</li>
@stop
@section('content')
    @include('Hospital.pages.assign_rooms.components.include.table')
    @include('Hospital.pages.assign_rooms.components.include.add')
    @include('Hospital.pages.assign_rooms.components.include.show')
    @include('Hospital.pages.assign_rooms.components.include.update')
@endsection
@section('script')
    @include('Hospital.pages.assign_rooms.components.extends.repository.script')
@endsection
