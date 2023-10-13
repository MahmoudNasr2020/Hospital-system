@extends('Hospital.layouts.app')
@section('header_line')
    <li class="breadcrumb-item"> الصلاحيات </li>
    <li class="breadcrumb-item"> تعديل صلاحية </li>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12 basic-info">
                <div class="card">
                    <div class="card-header">
                        <h5 style="display:inline-block;">
                            <i style="margin-left: 6px;color: darkred;" class="fa fa-user-lock"></i>تعديل صلاحية
                        </h5>
                        <button class="btn btn-outline-success" id="check_all" data-click="no" style="float: left">تحديد الكل</button>
                    </div>
                    <div class="card-body">
                        <form id="edit_form" data-route="{{ route('hospital.role.update',$role->id) }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>الاسم
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" value="{{ $role->name }}" class="form-control" placeholder="ادخل اسم الصلاحية" />
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="form-group table-responsive">
                                        <label>الصلاحيات
                                            <span class="text-danger">*</span>
                                        </label>
                                        <br>
                                        <table class="table-striped table" style="width: 100%;white-space: nowrap;">
                                            @foreach($permissions as $permission=>$item)
                                                <tr>
                                                    <td style="border-left: 2px solid #2A9;width: 50px">
                                                        <p class="mt-3">{{ $permission }}</p>
                                                    </td>
                                                    @foreach($item as $value)
                                                        <td>
                                                                <div class="form-check mt-3">
                                                                    <input class="form-check-input" type="checkbox" id="main_row_check"
                                                                           name="permission[]" {{ in_array($value->id,$role_permissions) ? 'checked' : '' }}
                                                                           value="{{ $value->id }}"
                                                                           style="width: 1.5em !important; height: 1.5em  !important;margin-top: 0px;" >
                                                                    <label class="form-check-label" for="main_row_check"></label>
                                                                    {{  substr($value->name,0,strpos($value->name,'-')) }}
                                                                </div>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </table>

                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="submit_button" class="btn btn-success mr-2">تعديل</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('Hospital.pages.roles.components.extends.ajax.update')
    @include('Hospital.pages.roles.components.extends.ajax.check_all')

@endsection
