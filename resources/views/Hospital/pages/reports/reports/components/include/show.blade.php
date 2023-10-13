@extends('Hospital.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/print/print.min.css') }}" media="print">
@endsection
@section('script')
    <script src="{{ asset('Dashboard/assets/plugins/print/print.min.js') }}"></script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- right content section -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="border-top: 3px solid #a92c2d;">
                                <ul class="nav nav-pills" style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;margin-bottom: 29px;">
                                    <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;margin-left:10px">
                                        <a class="nav-link active" id="base-pill31" target="_blank" href="{{ route('hospital.patient.show',['id'=>$data->patient->id,'name'=>str_replace(' ','_',$data->patient->name)]) }}"
                                           aria-expanded="true">
                                            عرض المريض
                                        </a>
                                    </li>

                                    <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                                        <a class="nav-link active" id="base-pill31" target="_blank" href="{{ route('hospital.report.edit',['id'=>$data->id,'name'=>str_replace(' ','_',$data->patient->name)]) }}"
                                           aria-expanded="true">
                                            تعديل التقرير
                                        </a>
                                    </li>

                                    <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                                        <a class="nav-link" id="base-pill31" style="cursor: pointer"
                                           aria-expanded="true"  onclick="printJS({ printable: 'list_view', type: 'html', header: 'التقرير' })">
                                            طباعة
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="list_view">
                                        <div class="tshadow mb25 bozero" style="border: 1px solid #e7ebf0;">
                                            <h3 class="pagetitleh2" style="background: #f2f2f2;margin: 0;font-size: 16px;padding: 8px 14px;color: #000;
                                            box-shadow: 0 0px 2px rgb(0 0 0 / 20%);
                                            border-bottom: 1px solid #d7dfe3;">عرض التقرير</h3>
                                            <div class="table-responsive around10 pt0" style="padding: 10px;padding-top: 20px !important;">
                                                {!! $data->description !!}
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

