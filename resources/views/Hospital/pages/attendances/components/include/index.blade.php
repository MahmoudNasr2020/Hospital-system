<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="display: inline-block;">تسجيل الحضور</h4>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form class="form" id="form_search">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;">اختار نوع المستخدم<span style="color: red"> *</span></label>
                                            <select class="form-control" name="user" id="user">
                                                @php
                                                    $users = ['doctor'=>'دكتور',
                                                            'receptionist'=>'موظف استقبال','accountant'=>'محاسب','laborer'=>'عامل','nurse'=>'ممرض'];
                                                @endphp
                                                @foreach($users as $k=>$user)
                                                    <option value="{{ $k }}">{{ $user }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>التاريخ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="date" id="date" style="text-align: right" data-value=""
                                                   class="form-control" placeholder="ادخل تاريخ الحضور" />
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer mt-4">
                                <button type="submit" class="btn btn-primary" id="submit_button">
                                    <span class="d-none d-sm-block">بحث</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
