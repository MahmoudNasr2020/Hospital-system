
<button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1 d-none" id="item_pay" data-toggle="modal" data-target="#model_item_pay"></button>
<div class="modal fade text-left" id="model_item_pay" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel160" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">دفع فاتورة</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" id="form_pay">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group position-relative has-icon-left mt-2" id="amount_total"></div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group position-relative has-icon-left mt-2" id="amount_deserve"></div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group position-relative has-icon-left mt-2" id="amount_paid"></div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;opacity:1;">دفع <span style="color: red"> *</span></label>
                                   <input class="form-control" name="paid" id="paid" placeholder="ادخل المبلغ">
                                </div>
                            </div>

                            <input type="hidden" id="id" name="id" value="">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-outline-primary" id="cache_button">
                    <span class="d-none d-sm-block">دفع نقدي</span>
                </button>

                <button type="submit" class="btn btn-outline-success" id="online_button">
                    <span class="d-none d-sm-block">دفع الكتروني</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
