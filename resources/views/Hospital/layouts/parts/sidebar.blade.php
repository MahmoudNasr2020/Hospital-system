<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{ route('hospital.home') }}">
                <img class="img-fluid for-light" src="{{ asset('Hospital/Images/'.\App\helper\settings()->logo) }}" width="50" height="50" alt="">
                <img class="img-fluid for-dark" src="{{ asset('Hospital/Images/'.\App\helper\settings()->logo) }}" width="50" height="50" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('hospital.home') }}"><img class="img-fluid" src="" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul style="padding-bottom: 40px;" class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{ route('hospital.home') }}"><img class="img-fluid" src="" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list">
                        <label></label>
                        <a class="sidebar-link" href="{{ route('hospital.home') }}">
                            <i class="fa fa-home" style="font-size: 20px; {{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}"></i>
                            <span style="margin-right:8px">الرئيسية</span></a>
                    </li>

                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px; {{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fa fa-list-check"></i>
                            <span style="margin-right:4px"> الأقسام</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('hospital.department.') }}">عرض الاقسام</a></li>
                        </ul>
                    </li>


                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" style="cursor: pointer">
                            <i style="font-size: 18px; {{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fa fa-users"></i>
                            <span style="margin-right: 4px">المستخدمين
                            </span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a style="cursor: pointer;" class="submenu-title">الاطباء</a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="{{ route('hospital.doctor.') }}">عرض الاطباء</a></li>
                                    <li><a href="{{ route('hospital.doctor.create') }}">اضافة طبيب</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="sidebar-submenu">
                            <li><a style="cursor: pointer;" class="submenu-title">الممرضين</a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="{{ route('hospital.nurse.') }}">عرض الممرضين</a></li>
                                    <li><a href="{{ route('hospital.nurse.create') }}">اضافة ممرض</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="sidebar-submenu">
                            <li><a style="cursor: pointer;" class="submenu-title">العمال</a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="{{ route('hospital.laborer.') }}">عرض العمال</a></li>
                                    <li><a href="{{ route('hospital.laborer.create') }}">اضافة عامل</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="sidebar-submenu">
                            <li><a style="cursor: pointer;" class="submenu-title">المحاسبين</a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="{{ route('hospital.accountant.') }}">عرض المحاسبين</a></li>
                                    <li><a href="{{ route('hospital.accountant.create') }}">اضافة محاسب</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="sidebar-submenu">
                            <li><a style="cursor: pointer;" class="submenu-title">موظفي الاستقبال</a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="{{ route('hospital.receptionist.') }}">عرض موظفي الاستقبال</a></li>
                                    <li><a href="{{ route('hospital.receptionist.create') }}">اضافة موظف استقبال</a></li>
                                </ul>
                            </li>
                        </ul>

                    </li>


                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px;{{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fa fa-hospital-user"></i>
                            <span style="margin-right:4px"> المرضي</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('hospital.patient.') }}">عرض المرضي</a></li>
                            <li><a href="{{ route('hospital.patient.create') }}">اضافة مريض</a></li>
                        </ul>
                    </li>


                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px;{{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fa fa-bed"></i>
                            <span style="margin-right:4px">غرف المستشفي</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('hospital.room.') }}">تسجيل الغرف</a></li>
                            <li><a href="{{ route('hospital.assign_room.') }}">تسجيل غرف المرضي</a></li>
                        </ul>
                    </li>


                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px;{{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fas fa-file-medical"></i>
                            <span style="margin-right:4px">التقارير</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('hospital.report.patient') }}">التقارير</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px;{{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fas fa-file-invoice-dollar"></i>
                            <span style="margin-right:4px">الفواتير</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('hospital.invoice.patient') }}">الفواتير</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px;{{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fa fa-dollar"></i>
                            <span style="margin-right:4px">الرواتب</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('hospital.monthsalary.') }}">عرض الرواتب</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px;{{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fa fa-user"></i>
                            <span style="margin-right:4px">الحضور</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('hospital.attendance.') }}">عرض الحضور</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px;{{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fa fa-list-check"></i>
                            <span style="margin-right:4px"> المسؤولين</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('hospital.admin.') }}">عرض المسؤولين</a></li>
                            <li><a href="{{ route('hospital.admin.create') }}">اضافة مسؤول</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px;{{ \App\helper\settings()->style == 'dark' ? "color:white" :"" }}" class="fa fa-user-lock"></i>
                            <span style="margin-right:4px"> صلاحيات المستخدمين</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('hospital.role.') }}">عرض الصلاحيات</a></li>
                            <li><a href="{{ route('hospital.role.create') }}">اضافة صلاحية</a></li>
                        </ul>
                    </li>


        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->
