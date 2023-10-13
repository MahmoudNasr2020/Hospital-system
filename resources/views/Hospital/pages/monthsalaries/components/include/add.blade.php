<div class="modal fade text-left" id="model_item_add" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel160" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">اضافة غرقة جديدة</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="form" id="form_add">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>السنة
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" name="year" id="year" type="number">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label>الشهر
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="month" id="month">
                                        <option value="0" disabled selected>اختار الشهر</option>
                                        @for($x=1;$x<=12;$x++)
                                            <option value="{{ $x }}">{{ $x }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">اغلاق</span>
                </button>
                <button type="submit" class="btn btn-primary" id="submit_button">
                    <span class="d-none d-sm-block">اضافة</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
