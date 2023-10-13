<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="display: inline-block;">راتب شهر {{ $month->month }} لسنة {{ $month->year }}</h4>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form class="form" id="form_search">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group position-relative has-icon-left mt-2">
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

                                </div>
                            </div>

                            <div class="modal-footer">
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
