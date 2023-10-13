@extends('Hospital.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection
@section('header_line')
    <li class="breadcrumb-item">تقارير المرضي </li>
    <li class="breadcrumb-item">تعديل تقرير المريض </li>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12 basic-info">
                <div class="card">
                    <div class="card-header">
                        <h5><i style="margin-left: 6px;color: darkred;" class="fas fa-file-medical"></i> تعديل التقرير </h5>
                    </div>

                    <div class="card-body">
                        <form id="form_edit" data-route="{{ route('hospital.report.update') }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>اسم المريض
                                        </label>
                                        <h4>
                                            {{ $data->patient->name }}
                                        </h4>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label>رقم الهوية
                                        </label>
                                        <h4>
                                            {{ $data->patient->identify_no }}
                                        </h4>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <label>التقرير
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea id="editor" name="description">{!! $data->description !!}</textarea>
                                </div>

                                <input type="hidden" id="id" name="id" value="{{$data->id }}">
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="submit_button" class="btn btn-primary mr-2">حفظ</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('Hospital.pages.reports.reports.components.extends.repository.checkEditor')
    @include('Hospital.pages.reports.reports.components.extends.ajax.update')
@endsection
