@extends('Hospital.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- right content section -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="margin-right: 22px; display: inline-block">عرض صلاحية</h4>
                                <a class="heading-elements-toggle" style="float: left;cursor: pointer" id="reload_table">
                                    <i class='fa fa-refresh font-medium-3'></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills" style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;margin-bottom: 29px;">
                                    <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                                        <a class="nav-link active" id="base-pill31" href="{{ route('hospital.role.edit',['id'=>$role->id,'name'=>str_replace(' ','_',$role->name)]) }}"
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
                                                        <td class="col-md-4" >اسم الصلاحية</td>
                                                        <td class="col-md-5" >{{ $role->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>الصلاحيات</td>
                                                        <td>
                                                            @foreach($role->permissions as $permission)
                                                                <button class="btn btn-success mt-3">{{ $permission->name }}</button>
                                                            @endforeach
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
@endsection

