<button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1 d-none" id="update_item" data-toggle="modal" data-target="#model_item_update"></button>
<div class="modal fade text-left" id="model_item_update" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel170" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel170">تعديل الشهر</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" id="form_update" data-route="{{ route('hospital.monthsalary.update') }}">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>السنة
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" name="year" id="year_update" type="number">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label>الشهر
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="month" id="month_update">
                                        <option value="0" class="month_update_option" disabled selected>اختار الشهر</option>
                                        @for($x=1;$x<=12;$x++)
                                            <option value="{{ $x }}" class="month_update_option">{{ $x }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" id="id" name="id">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">اغلاق</span>
                </button>
                <button type="submit" class="btn btn-success" id="submit_button_edit">
                    <span class="d-none d-sm-block">تعديل</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
