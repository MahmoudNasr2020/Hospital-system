@extends('Hospital.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.css') }}">
@endsection
@section('header_line')
    <li class="breadcrumb-item">المحاسبين</li>
    <li class="breadcrumb-item">تعديل محاسب</li>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12 basic-info">
                <div class="card">
                    <div class="card-header">
                        <h5><i style="margin-left: 6px;color: darkred;" class="fa fa-usd"></i>تعديل محاسب </h5>
                    </div>
                    <div class="card-body">
                        <form id="edit_member" data-route="{{ route('hospital.accountant.update',$data->id) }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" value="{{ $data->user->name }}" class="form-control" placeholder="ادخل الاسم" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اسم المستخدم
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="user_name" value="{{ $data->user->user_name }}" class="form-control" placeholder="ادخل اسم المستخدم" />
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
                                        <label>رقم الهوية الشخصية
                                        </label>
                                        <input type="text" name="identify_no" id="identify_no" style="text-align: right"
                                               value="{{ $data->identify_no }}" class="form-control" placeholder="ادخل رقم الهوية الشخصية" />
                                    </div>
                                </div>


                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>النوع
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="gender">
                                            <option value="0" selected disabled>اختر النوع</option>
                                            <option value="ذكر" {{ $data->gender == 'ذكر' ? 'selected' :'' }}>ذكر</option>
                                            <option value="مؤنث" {{ $data->gender == 'مؤنث' ? 'selected' :'' }}>أنثى</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>الراتب (بالجنيه المصري)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="salary" value="{{ $data->salary }}" class="form-control" placeholder="ادخل الراتب" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>تاريخ الميلاد
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="date_of_birth" id="date_of_birth" style="text-align: right"
                                               value="{{ $data->date_of_birth }}"  class="form-control" placeholder="ادخل تاريخ الميلاد" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>رقم الموبايل
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="mobile_phone" id="mobile_phone" style="text-align: right"
                                               value="{{ $data->mobile_phone }}" class="form-control" placeholder="ادخل رقم الموبايل الشخصي" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>رقم المنزل
                                        </label>
                                        <input type="text" name="home_phone" id="home_phone" style="text-align: right" value="{{ $data->home_phone }}"
                                               class="form-control" placeholder="ادخل رقم المنزل" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>الحالة
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="status">
                                            <option value="0" selected disabled>اختر الحالة</option>
                                            <option value="مفعل" {{ $data->user->status == 'مفعل' ? 'selected' :'' }}>مفعل</option>
                                            <option value="معطل" {{ $data->user->status == 'معطل' ? 'selected' :'' }}>معطل</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>تاريخ الانضمام
                                            <span class="text-danger">*</span></label>
                                        <input name="date_joining"  id="date_joining" data-toggle="datepicker" value="{{ $data->date_joining }}"
                                               class="form-control" placeholder="ادخل تاريخ الانضمام">

                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>العنوان
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="address"  class="form-control" value="{{ $data->address }}" placeholder="ادخل العنوان" />
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

                                <div class="col-md-6">
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
                                                        <img id="show_image" src="{{ $data->user->photo == 'default.png'
                                                     ? asset('Hospital/images/'.$data->user->user_type.'s/'.$data->user->photo)
                                                     : asset('Hospital/images/'.$data->user->photo) }}" style="width: 48px;height: 48px;object-fit: cover;border-radius: 50%;" class="" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="user_id" value="{{ $data->user->id }}">
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

    @include('Hospital.pages.accountants.components.include.imageModal',['edit'=>true])
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
        $('#date_joining,#date_of_birth').datepicker({
            language:'ar-AE',
            autoPick:true,
        });
    </script>
    @include('hospital.pages.accountants.components.extends.ajax.update')
@endsection
