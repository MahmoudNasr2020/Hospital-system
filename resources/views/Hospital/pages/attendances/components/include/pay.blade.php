<button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1 d-none" id="pay_item" data-toggle="modal" data-target="#model_item_pay"></button>
<div class="modal fade text-left" id="model_item_pay" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel160" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">صرف الراتب</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" id="form_pay">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;">الراتب المستحق<span style="color: red"> *</span></label>
                                    <p id="salary" style="font-size: 15px"></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;">الحوافز</label>
                                    <input type="text" id="incentives" class="form-control" name="incentives"
                                           placeholder="الحوافز">
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;">الخصومات</label>
                                    <input type="text" id="discounts" class="form-control" name="discounts"
                                           placeholder="الخصومات">
                                </div>
                            </div>

                            <input type="hidden" id="month_id" name="month_id">
                            <input type="hidden" id="user_id" name="user_id">

                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">اغلاق</span>
                </button>
                <button type="submit" class="btn btn-primary" id="submit_button">
                    <span class="d-none d-sm-block">صرف</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
