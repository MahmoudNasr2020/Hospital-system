@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.settings.components.extends.repository.style')
@endsection
@section('content')
    <div class="card" style="padding: 14px;">
        <div class="card-header">
            <h5>تتم الاصلاحات</h5>
        </div>
        <div class="card-body">
            <div class="header pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                        <!-- Card stats -->
                        <div class="row">
                            <div class="col-12">
                               <img src="{{ asset('Hospital/Images/maintenance/maintenance.jpg') }}" style="width: 400px;margin: 0 auto;display: block;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('Hospital.pages.settings.components.extends.repository.script')
@endsection
