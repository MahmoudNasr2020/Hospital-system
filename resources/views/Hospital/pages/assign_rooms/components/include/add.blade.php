<div class="modal fade text-left" id="model_item_add" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel160" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">اضافة جديدة</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="form" id="form_add">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-6">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;"> المريض<span style="color: red"> *</span></label>
                                    <select class="form-control" name="patient" id="patient">
                                        <option value="0" selected disabled>اختار المريض</option>
                                        @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->name }} {{ ' ('. $patient->identify_no .')' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;"> اختار الغرفة<span style="color: red"> *</span></label>
                                    <select class="form-control" name="room" id="room">
                                        <option value="0" selected>اختار الغرفة</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}">{{ $room->room_number }} {{ ' ('. $room->department->name  .')' }}</option>
                                        @endforeach
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
