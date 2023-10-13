@extends('Hospital.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.css') }}">
@endsection
@section('header_line')
    <li class="breadcrumb-item">المسؤولين</li>
    <li class="breadcrumb-item">تعديل مسؤول</li>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12 basic-info">
                <div class="card">
                    <div class="card-header">
                        <h5><i style="margin-left: 6px;color: darkred;" class="fa fa-user-md"></i>تعديل مسؤول </h5>
                    </div>
                    <div class="card-body">
                        <form id="edit_member" data-route="{{ route('hospital.admin.update',$data->id) }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="ادخل الاسم" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اسم المستخدم
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="user_name" value="{{ $data->user_name }}" class="form-control" placeholder="ادخل اسم المستخدم" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>كلمة السر
                                            <span class="text-danger"> * </span>
                                        </label>
                                        <input type="password" name="password" class="form-control"  placeholder="ادخل كلمة السر" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>تاكيد كلمة السر
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="تاكيد كلمة السر" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>الصلاحيات
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="roles[]" multiple>
                                            <option value="0" selected disabled>اختر الصلاحية</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ in_array($role->name,$data_roles) ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>الحالة
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="status">
                                            <option value="0" selected disabled>اختر الحالة</option>
                                            <option value="مفعل" {{ $data->status == 'مفعل' ? 'selected' :'' }}>مفعل</option>
                                            <option value="معطل" {{ $data->status == 'معطل' ? 'selected' :'' }}>معطل</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>الصورة
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div></div>
                                        <div class="custom-file">
                                            <div class="image-upload">
                                                <label for="file-input">
                                                    <img id="previewImg" src="{{ asset('Dashboard/assets/images/image-upload-icon.jpg') }}" style="width: 100px; height: 100px;cursor: pointer" />
                                                </label>
                                                <input id="file-input" type="file" style="display: none;" name="image" />
                                                <div  style="margin-top: 5px;display: inline-block;">
                                                    <a href="#" data-toggle="modal" data-target="#model_item_image">
                                                        <img id="show_image" src="{{ $data->photo == 'default.png'
                                                     ? asset('Hospital/images/'.$data->user_type.'s/'.$data->photo)
                                                     : asset('Hospital/images/'.$data->photo) }}" style="width: 48px;height: 48px;object-fit: cover;border-radius: 50%;" class="" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $data->id }}">
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
    @include('Hospital.pages.admins.components.include.imageModal',['edit'=>true])
@endsection
@section('script')
    <script src="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.ar-AE.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image').attr('src', e.target.result).css('display','inline-block');
                    $('#image_modal').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file-input").change(function(){
            readURL(this);
        });
        $('input').attr('autocomplete','off');
    </script>
    @include('hospital.pages.admins.components.extends.ajax.update')
@endsection
