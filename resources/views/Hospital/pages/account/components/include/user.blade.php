@php

$user = $data->user_type;
$user = ucfirst($user);
$model = '\App\Models\\';
$model .= $user;
$user = $model::where('user_id',$data->id)->first();
@endphp

<div class="col-12">
    <div class="row">
        <!-- left menu section -->
        <div class="col-md-4 mb-2 mb-md-0 pills-stacked">
            <div class="card">
                <div class="card-body box box-primary">
                    <div class="box-body box-profile" >
                        <img data-toggle="modal" data-target="#model_item_image"
                             class="student-show-img profile-user-img img-responsive img-circle"
                             src="{{  $user->user->photo == 'default.png'
                                                     ? asset('Hospital/images/'.$user->user->user_type.'s/'.$user->user->photo)
                                                     : asset('Hospital/images/'.$user->user->photo) }}"
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
                        <h3 class="profile-username text-center">{{ $user->user->name }}</h3>
                        <p style="text-align: center;color: red;" id="text_disabled_user">
                            {{ $data->status  == 'disabled' ? 'This Doctor is Disabled' : '' }}
                        </p>

                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item listnoback">
                                <b>الاسم</b> <a class="pull-right text-aqua"
                                                style="float:left">{{ $user->user->name }}</a>
                            </li>

                            <li class="list-group-item listnoback">
                                <b>اسم المستخدم</b> <a class="pull-right text-aqua"
                                                       style="float:left">{{ $user->user->user_name }}</a>
                            </li>

                            <li class="list-group-item listnoback">
                                <b>العمر</b> <a class="pull-right text-aqua"
                                                style="float:left">{{ Carbon\Carbon::parse(date('Y-m-d',strtotime($user->date_of_birth)))->age }} سنة</a>
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
                            <a class="nav-link active" id="base-pill31" data-toggle="pill"
                               href="#list_view"
                               aria-expanded="true">
                                التفاصيل
                            </a>
                        </li>


                        <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                            <a class="nav-link" id="base-pill31" target="_blank"
                               href="{{ route('hospital.'.$user->user->user_type.'.edit',['id'=>$user->id,'name'=>str_replace(' ','_',$user->user->name)]) }}"
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
                                            <td class="col-md-5" >{{ $user->date_joining }}</td>
                                        </tr>
                                        <tr>
                                            <td>العنوان</td>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>رقم الهوية</td>
                                            <td>{{ $user->identify_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>رقم الموبايل</td>
                                            <td>{{ $user->mobile_phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>رقم المنزل</td>
                                            <td>{{ $user->home_phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>الراتب</td>
                                            <td>{{ $user->salary }} جنيه</td>
                                        </tr>
                                        <tr>
                                            <td>النوع</td>
                                            <td>{{ $user->gender }}</td>
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

<div class="col-12">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3>الحضور</h3>
                </div>

                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>

