@extends('Hospital.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12 basic-info">
                <div class="card">
                    <div class="card-header">
                        <h5><i style="margin-left: 6px;color: darkred;" class="fa fa-pen-to-square"></i>اعدادت النظام </h5>
                    </div>
                    <div class="card-body">
                        <form id="edit_member" data-route="{{ route('hospital.setting.update') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اسم النظام
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="site_name" value="{{ \App\helper\settings()->site_name }}" class="form-control"
                                               placeholder="ادخل الاسم" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>التصميم
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="style">
                                            <option value="0" selected disabled>اختر تصميم النظام</option>
                                            <option value="light" {{ \App\helper\settings()->style == 'light' ? 'selected':'' }}>نهاري</option>
                                            <option value="dark" {{ \App\helper\settings()->style == 'dark' ? 'selected':'' }} >ليلي</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>حالة الموقع
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="maintenance">
                                            <option value="0" selected disabled>اختر حالة الموقع</option>
                                            <option value="open" {{ \App\helper\settings()->maintenance == 'open' ? 'selected':'' }}>مفتوح</option>
                                            <option value="close" {{ \App\helper\settings()->maintenance == 'close' ? 'selected':'' }} >مغلق</option>
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
                                                <input id="file-input" type="file" style="display: none;" name="logo" />
                                                <div  style="margin-top: 5px;display: inline-block;">
                                                    <a href="#" data-toggle="modal" data-target="#model_item_image">
                                                        <img id="show_image" src="{{ asset('Hospital/Images/'.\App\helper\settings()->logo) }}" style="width: 48px;height: 48px;object-fit: cover;border-radius: 50%;" class="" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>الايقونة
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div></div>
                                        <div class="custom-file">
                                            <div class="image-upload">
                                                <label for="file-input-icon">
                                                    <img id="previewImg1" src="{{ asset('Dashboard/assets/images/image-upload-icon.jpg') }}" style="width: 100px; height: 100px;cursor: pointer" />
                                                </label>
                                                <input id="file-input-icon" type="file" style="display: none;" name="icon" />
                                                <div  style="margin-top: 5px;display: inline-block;">
                                                    <a href="#" data-toggle="modal" data-target="#model_item_image_icon">
                                                        <img id="show_image_icon" src="{{ asset('Hospital/Images/'.\App\helper\settings()->icon) }}" style="width: 48px;height: 48px;object-fit: cover;border-radius: 50%;" class="" alt="">
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
    @include('Hospital.pages.settings.components.include.imageModal')
    @include('Hospital.pages.settings.components.include.imageModalIcon')
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

        function readURLIcon(inputIcon) {
            if (inputIcon.files && inputIcon.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image_icon').attr('src', e.target.result).css('display','inline-block');
                    $('#image_modal_icon').attr('src', e.target.result);

                }
                reader.readAsDataURL(inputIcon.files[0]);
            }
        }
        $("#file-input").change(function(){
            readURL(this);
        });

        $("#file-input-icon").change(function(){
            readURLIcon(this);
        });
        $('input').attr('autocomplete','off');
        $('#date_joining,#date_of_birth').datepicker({
            language:'ar-AE',
            autoPick:true,
        });
    </script>
    @include('hospital.pages.settings.components.extends.ajax.update')
@endsection
