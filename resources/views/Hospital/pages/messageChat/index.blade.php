@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.messageChat.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">الرسائل</li>
@stop
@section('content')
    @include('Hospital.pages.messageChat.components.include.index')
    @include('Hospital.pages.messageChat.components.include.table')
    @include('Hospital.pages.messageChat.components.include.pay')
@endsection
@section('script')
    @include('Hospital.pages.messageChat.components.extends.repository.script')
@endsection
