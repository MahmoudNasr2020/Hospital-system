@extends('Hospital.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.css') }}">
@endsection
@section('header_line')
    <li class="breadcrumb-item">الدكاترة</li>
    <li class="breadcrumb-item">اضافة دكتور</li>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12 basic-info">
                <div class="card">
                    <div class="card-header">
                        <h5><i style="margin-left: 6px;color: darkred;" class="fa fa-user-md"></i>إضافة دكتور جديد</h5>
                    </div>
                    <div class="card-body">
                        <form id="add_member" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الاسم
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="name" class="form-control" placeholder="ادخل الاسم" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>اسم المستخدم
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="user_name" name="user_name" class="form-control" placeholder="ادخل اسم المستخدم" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>كلمة السر
                                                <span class="text-danger"> * </span>
                                                <span class="">(الافتراضية : 123456 ) </span>
                                            </label>
                                            <input type="password" name="password" class="form-control" value="123456"  placeholder="ادخل كلمة السر" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>تاكيد كلمة السر
                                                <span class="text-danger">*</span>
                                                <span class="">(الافتراضية : 123456 )</span>
                                            </label>
                                            <input type="password" name="password_confirmation" class="form-control" value="123456" placeholder="تاكيد كلمة السر" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>رقم الهوية الشخصية
                                            </label>
                                            <input type="text" name="identify_no" id="identify_no" style="text-align: right"
                                                   class="form-control"placeholder="ادخل رقم الهوية الشخصية" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>القسم
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" name="department_id">
                                                <option value="0" disabled selected>اختر القسم</option>
                                                @foreach($data as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>النوع
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" name="gender">
                                                <option value="0" selected disabled>اختر النوع</option>
                                                <option value="ذكر">ذكر</option>
                                                <option value="مؤنث">أنثى</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>الراتب (بالجنيه المصري)
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="salary" class="form-control" placeholder="ادخل الراتب" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>تاريخ الميلاد
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="date_of_birth" id="date_of_birth" style="text-align: right"
                                                   class="form-control" placeholder="ادخل تاريخ الميلاد" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>رقم الموبايل
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="mobile_phone" id="mobile_phone" style="text-align: right"
                                                   class="form-control" placeholder="ادخل رقم الموبايل الشخصي" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>رقم المنزل
                                            </label>
                                            <input type="text" name="home_phone" id="home_phone" style="text-align: right"
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
                                                <option value="مفعل">مفعل</option>
                                                <option value="معطل">معطل</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>تاريخ الانضمام
                                                <span class="text-danger">*</span></label>
                                            <input name="date_joining" id="date_joining" data-toggle="datepicker" class="form-control" placeholder="ادخل تاريخ الانضمام">

                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>العنوان
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="address"  class="form-control" placeholder="ادخل العنوان" />
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
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
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
                                                            <img id="show_image" src="#" style="width: 48px;height: 48px;object-fit: cover;border-radius: 50%;display: none" class="" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


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
@include('Hospital.pages.doctors.components.include.imageModal')
@endsection
@section('script')
    @include('Hospital.pages.doctors.components.extends.ajax.add')
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
@endsection
