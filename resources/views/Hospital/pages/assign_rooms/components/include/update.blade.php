<button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1 d-none" id="update_item" data-toggle="modal" data-target="#model_item_update"></button>
<div class="modal fade text-left" id="model_item_update" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel170" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel170">تعديل غرفة المريض</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" id="form_update" data-route="{{ route('hospital.assign_room.update') }}">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-6">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;"> المريض<span style="color: red"> *</span></label>
                                    <select class="form-control" name="patient" id="patient_name_update">
                                        <option value="0" class="option_patient" disabled>المريض</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;"> اختار الغرفة<span style="color: red"> *</span></label>
                                    <select class="form-control" name="room" id="room">
                                        <option value="0" class="option_room" selected disabled>اختار الغرفة</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}" class="option_room">{{ $room->room_number }} {{ ' ('. $room->department->name  .')' }}</option>
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
                <button type="submit" class="btn btn-success" id="submit_button_edit">
                    <span class="d-none d-sm-block">تعديل</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
