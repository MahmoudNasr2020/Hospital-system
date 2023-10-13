@extends('Hospital.layouts.app')

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
                                         src="{{  $data->user->photo == 'default.png'
                                                     ? asset('Hospital/images/'.$data->user->user_type.'s/'.$data->user->photo)
                                                     : asset('Hospital/images/'.$data->user->photo) }}"
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
                                    <h3 class="profile-username text-center">{{ $data->user->name }}</h3>
                                    <p style="text-align: center;color: red;" id="text_disabled_user">
                                        {{ $data->status  == 'disabled' ? 'This Doctor is Disabled' : '' }}
                                    </p>

                                    <ul class="list-group list-group-unbordered">

                                        <li class="list-group-item listnoback">
                                            <b>الاسم</b> <a class="pull-right text-aqua"
                                                                   style="float:left">{{ $data->user->name }}</a>
                                        </li>

                                        <li class="list-group-item listnoback">
                                            <b>اسم المستخدم</b> <a class="pull-right text-aqua"
                                                                  style="float:left">{{ $data->user->user_name }}</a>
                                        </li>

                                        <li class="list-group-item listnoback">
                                            <b>العمر</b> <a class="pull-right text-aqua"
                                                            style="float:left">{{ Carbon\Carbon::parse(date('Y-m-d',strtotime($data->date_of_birth)))->age }} سنة</a>
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
                                        <a class="nav-link active" id="base-pill31" href="{{ route('hospital.accountant.edit',['id'=>$data->id,'name'=>str_replace(' ','_',$data->user->name)]) }}"
                                           aria-expanded="true">
                                            تعديل
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="list_view">
                                        <div class="tshadow mb25 bozero" style="border: 1px solid #e7ebf0;">
                                            <h3 class="pagetitleh2" style="background: #f2f2f2;margin: 0;font-size: 16px;padding: 8px 14px;color: #000;
                                            box-shadow: 0 0px 2px rgb(0 0 0 / 20%);
                                            border-bottom: 1px solid #d7dfe3;">التفاصيل العامة</h3>
                                            <div class="table-responsive around10 pt0" style="padding: 10px;padding-top: 0 !important;">
                                                <table class="table table-hover table-striped tmb0 table-student-show" >
                                                    <tbody>
                                                    <tr>
                                                        <td class="col-md-4" >تاريخ الالتحاق</td>
                                                        <td class="col-md-5" >{{ $data->date_joining }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>العنوان</td>
                                                        <td>{{ $data->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>رقم الهوية</td>
                                                        <td>{{ $data->identify_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>رقم الموبايل</td>
                                                        <td>{{ $data->mobile_phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>رقم المنزل</td>
                                                        <td>{{ $data->home_phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>الراتب</td>
                                                        <td>{{ $data->salary }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>النوع</td>
                                                        <td>{{ $data->gender }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>الصلاحيات</td>
                                                        <td>
                                                            @if(!empty($data->user->getRoleNames()))
                                                                @foreach($data->user->getRoleNames() as $role )
                                                                    <button class="btn btn-success btn-round">
                                                                        {{ $role }}
                                                                    </button>
                                                                @endforeach
                                                            @endif()
                                                        </td>
                                                    </tr>

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

    @include('Hospital.pages.accountants.components.include.imageShow',['photo'=>$data->user->photo])
@endsection

