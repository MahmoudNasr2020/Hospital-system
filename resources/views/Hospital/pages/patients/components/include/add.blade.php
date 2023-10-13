@extends('Hospital.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.css') }}">
@endsection
@section('header_line')
    <li class="breadcrumb-item">المرضي</li>
    <li class="breadcrumb-item">اضافة مريض</li>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12 basic-info">
                <div class="card">
                    <div class="card-header">
                        <h5><i style="margin-left: 6px;color: darkred;" class="fa fa-hospital-user"></i>إضافة مريض</h5>
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
                                            <label>رقم الهوية الشخصية
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="identify_no" id="identify_no" style="text-align: right"
                                                   class="form-control"placeholder="ادخل رقم الهوية الشخصية" />
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
                                            <label>العمر
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="age" class="form-control" placeholder="ادخل العمر" />
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>رقم الموبايل
                                            </label>
                                            <input type="text" name="mobile_phone" id="mobile_phone" style="text-align: right"
                                                   class="form-control" placeholder="ادخل رقم الموبايل الشخصي" />
                                        </div>
                                    </div>



                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>تاريخ الدخول
                                                <span class="text-danger">*</span></label>
                                            <input name="date_joining" id="date_joining" data-toggle="datepicker" class="form-control" placeholder="ادخل تاريخ الدخول">

                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>العنوان
                                            </label>
                                            <input type="text" name="address"  class="form-control" placeholder="ادخل العنوان" />
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>الصورة
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

@include('Hospital.pages.patients.components.include.imageModal')
@endsection
@section('script')
    @include('Hospital.pages.patients.components.extends.ajax.add')
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
