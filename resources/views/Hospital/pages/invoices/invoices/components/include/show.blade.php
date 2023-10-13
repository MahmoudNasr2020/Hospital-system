@extends('Hospital.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/print/print.min.css') }}">
@endsection
@section('script')
    <script src="{{ asset('Dashboard/assets/plugins/print/print.min.js') }}"></script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-4 mb-2 mb-md-0 pills-stacked">
                        <div class="card">
                            <div class="card-body box box-primary">
                                <div class="box-body box-profile" >
                                    <img data-toggle="modal" data-target="#model_item_image"
                                         class="student-show-img profile-user-img img-responsive img-circle"
                                         src="{{ asset('Hospital/images/'.$data->patient->photo)  }}"
                                         alt="User profile picture"
                                         style="height: 100px;
                                        flex-shrink: 0;
                                        min-width: 100px;
                                        min-height: 100px;
                                        margin: 5px auto;
                                        width: 100px;
                                        padding: 3px;
                                        border: 3px solid #d2d6de;
                                        border-radius: 50%;
                                        display: block;
                                        cursor:pointer">
                                    <h3 class="profile-username text-center">{{ $data->patient->name }}</h3>

                                    <ul class="list-group list-group-unbordered">

                                        <li class="list-group-item listnoback">
                                            <b>الاسم</b> <a class="pull-right text-aqua"
                                                            style="float:left">{{ $data->patient->name }}</a>
                                        </li>

                                        <li class="list-group-item listnoback">
                                            <b>رقم الهوية</b> <a class="pull-right text-aqua"
                                                                   style="float:left">{{ $data->patient->identify_no }}</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right content section -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body" style="border-top: 3px solid #a92c2d;">
                                <ul class="nav nav-pills" style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;margin-bottom: 29px;">
                                    <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                                        <a class="nav-link active" id="base-pill31" data-toggle="pill" href="#list_view"
                                           aria-expanded="true">
                                            تفاصيل الفاتورة
                                        </a>
                                    </li>

                                    <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                                        <a class="nav-link" id="base-pill31" data-toggle="pill" href="#invoice_view"
                                           aria-expanded="true">
                                            تفاصيل الدفع
                                        </a>
                                    </li>

                                    <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                                        <a class="nav-link" id="base-pill31" target="_blank" href="{{ route('hospital.patient.show',['id'=>$data->patient->id,'name'=>str_replace(' ','_',$data->patient->name)]) }}"
                                           aria-expanded="true">
                                            عرض المريض
                                        </a>
                                    </li>

                                    <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                                        <a class="nav-link" id="base-pill31" style="cursor: pointer"
                                           aria-expanded="true"  onclick="printJS({ printable: 'list_view', type: 'html', header: 'الفاتورة' })">
                                            طباعة
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="list_view">
                                        <div class="tshadow mb25 bozero" style="border: 1px solid #e7ebf0;">
                                            <h3 class="pagetitleh2" style="background: #f2f2f2;margin: 0;font-size: 16px;padding: 8px 14px;color: #000;
                                            box-shadow: 0 0px 2px rgb(0 0 0 / 20%);
                                            border-bottom: 1px solid #d7dfe3;">تفاصيل الفاتورة</h3>
                                            <div class="table-responsive around10 pt0" style="padding: 10px;padding-top: 0 !important;">
                                                <table class="table table-hover table-striped tmb0 table-student-show" >
                                                    <tbody>
                                                    <tr>
                                                        <td class="col-md-4" >رقم الفاتورة</td>
                                                        <td class="col-md-5" >{{ $data->invoice_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>اجمالي المبلغ</td>
                                                        <td>{{ $data->total .' جنيه'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>المستحق</td>
                                                        <td>{{ $data->total - $data->amount_paid .' جنيه'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>المدفوع</td>
                                                        <td>{{ $data->amount_paid .' جنيه'}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>حالة الدفع</td>
                                                        <td>{{ $data->payment_status }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>طريقة الدفع</td>
                                                        <td>{{ $data->payment_type }}</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="invoice_view">
                                        <div class="tshadow mb25 bozero" style="border: 1px solid #e7ebf0;">
                                            <h3 class="pagetitleh2" style="background: #f2f2f2;margin: 0;font-size: 16px;padding: 8px 14px;color: #000;
                                            box-shadow: 0 0px 2px rgb(0 0 0 / 20%);
                                            border-bottom: 1px solid #d7dfe3;">تفاصيل الدفع</h3>
                                            <div class="table-responsive around10 pt0" style="padding: 10px;padding-top: 0 !important;">
                                                <table class="table table-hover table-striped tmb0 table-student-show" id="table">
                                                    <tbody>
                                                    @foreach($data->PaymentStatuses as $k=>$paymentStatus)
                                                        @php
                                                            $status='';
                                                            $paid ='';
                                                             $added_by ='';
                                                             $margin='';
                                                            if($paymentStatus->amount_paid > 0)
                                                            {
                                                                $status = 'دفع';
                                                                $paid = $paymentStatus->amount_paid;
                                                            }
                                                            else {
                                                                $status = 'سحب';
                                                                $paid = abs($paymentStatus->amount_paid);
                                                            }

                                                          if($paymentStatus->addedBy != null)
                                                            {
                                                                if($paymentStatus->addedBy->user_type == 'admin')
                                                                {
                                                                    $added_by = '<a href="'.route('hospital.admin.show',['id'=>$paymentStatus->added_by,'name'=> str_replace(' ','_',$paymentStatus->addedBy->name)]).'" target="_blank">'.$paymentStatus->addedBy->name.'</a>';
                                                                }

                                                                else
                                                                {
                                                                    $user = $paymentStatus->addedBy->user_type;
                                                                    $user = ucfirst($user);
                                                                    $model = '\App\Models\\';
                                                                    $model .= $user;
                                                                    $user = $model::where('user_id',$paymentStatus->addedBy->id)->first();
                                                                    $added_by = '<a href="'.route('hospital.'.$paymentStatus->addedBy->user_type.'.show',['id'=>$user->id,'name'=> str_replace(' ','_',$user->name)]).'" target="_blank">'.$user->name.'</a>';
                                                                }
                                                            }

                                                            else
                                                            {
                                                                $added_by =  'غير مسجل';
                                                            }

                                                        if($k == 0)
                                                            {
                                                               $margin = '20px';
                                                            }
                                                        @endphp

                                                        <p style="font-size: 15px;margin-top: {{ $margin }}">
                                                            تم {{ $status }}  {{ $paid .' جنيه' }} {{ $paymentStatus->payment_type.'اٌ' }}  ويصل المبلغ المدفوع الان {{ $paymentStatus->total_paid .' جنيه'}}
                                                        </p>

                                                        <p style="font-size: 15px">
                                                            التاريخ  : {{ date_format($paymentStatus->created_at,'Y-m-d') }}
                                                        </p>

                                                        <p style="font-size: 15px">
                                                            الوقت  : {{ date_format($paymentStatus->created_at,'H:i:s') }}
                                                        </p>

                                                        <p style="font-size: 15px">
                                                            تمت الاضافة بواسطة  : {!! $added_by !!}
                                                        </p>
                                                        <hr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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

    @include('Hospital.pages.invoices.invoices.components.include.imageShow',['photo'=>$data->patient->photo])

@endsection


