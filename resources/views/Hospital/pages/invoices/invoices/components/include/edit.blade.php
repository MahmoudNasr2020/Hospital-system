<button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1 d-none" id="update_item" data-toggle="modal" data-target="#model_item_update"></button>
<div class="modal fade text-left" id="model_item_update" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel170" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel170">تعديل الفاتورة</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" id="form_update" data-route="{{ route('hospital.invoice.update') }}">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;">ادخل اجمالي الفاتورة<span style="color: red"> *</span></label>
                                    <input type="text" id="total_update" class="form-control" name="total"
                                           placeholder="ادخل اجمالي الفاتورة">
                                </div>
                            </div>

                            <input type="hidden" id="invoice_id" name="invoice_id">
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
