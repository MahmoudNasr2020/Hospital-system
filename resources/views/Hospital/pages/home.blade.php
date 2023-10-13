@extends('Hospital.layouts.app')
@section('style')
    @include('Hospital.pages.settings.components.extends.repository.style')
@endsection
@section('content')
    <div class="card" style="padding: 14px;">
        <div class="card-header">
            <h5>الاحصائيات</h5>
        </div>
        <div class="card-body">
            <div class="header pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                        <!-- Card stats -->
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">اجمالي المرضي</h5>
                                                <span class="h2 font-weight-bold mb-0">{{ \App\Models\Patient::count() }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="">
                                                    <i class="fa fa-hospital-user" style="font-size: 27px;margin-top: 12px;color: currentcolor;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <span class="text-nowrap">منذ اخر تحديث</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">اجمالي التقارير</h5>
                                                <span class="h2 font-weight-bold mb-0">{{ \App\Models\Report::count() }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="">
                                                    <i class="fa fa-clipboard" style="font-size: 27px;margin-top: 12px;color: brown;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <span class="text-nowrap">منذ اخر تحديث</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">اجمالي الفواتير</h5>
                                                <span class="h2 font-weight-bold mb-0">{{ \App\Models\Invoice::count() }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="">
                                                    <i class="fa fa-file-invoice-dollar" style="font-size: 27px;margin-top: 12px;color: green;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <span class="text-nowrap">منذ اخر تحديث</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0"> المستخدمين</h5>
                                                <span class="h2 font-weight-bold mb-0">{{ \App\Models\User::count() }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="">
                                                    <i class="fa fa-users" style="font-size: 27px;margin-top: 12px;color: teal;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <span class="text-nowrap">منذ اخر تحديث</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Auth::user()->user_type == 'admin')
        <div class="card" style="padding: 15px">
            <div class="container-fluid mt--6">

                <div class="row">
                    <div class="col-xl-4">
                        <!-- Members list group card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <!-- Title -->
                                <h5 class="h3 mb-0">اخر الاطباء المسجلين</h5>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush list my--3">
                                    @foreach(\App\Models\Doctor::limit(10)->get() as $doctor)
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar rounded-circle">
                                                        <img alt="Image placeholder" src="{{  $doctor->user->photo == 'default.png'
                                                                                     ? asset('Hospital/images/'.$doctor->user->user_type.'s/'.$doctor->user->photo)
                                                                                     : asset('Hospital/images/'.$doctor->user->photo) }}">
                                                    </a>
                                                </div>
                                                <div class="col ml--2">
                                                    <h6 class="mb-0">
                                                        <a href="{{ route('hospital.account.',['id'=>$doctor->user->id,str_replace(' ','_',$doctor->user->name)]) }}">{{ $doctor->user->name }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <!-- Members list group card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <!-- Title -->
                                <h5 class="h3 mb-0">اخر الممرضين المسجلين</h5>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush list my--3">
                                    @foreach(\App\Models\Nurse::limit(10)->get() as $nurse)
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar rounded-circle">
                                                        <img alt="Image placeholder" src="{{  $nurse->user->photo == 'default.png'
                                                                                     ? asset('Hospital/images/'.$nurse->user->user_type.'s/'.$nurse->user->photo)
                                                                                     : asset('Hospital/images/'.$nurse->user->photo) }}">
                                                    </a>
                                                </div>
                                                <div class="col ml--2">
                                                    <h6 class="mb-0">
                                                        <a href="{{ route('hospital.account.',['id'=>$nurse->user->id,str_replace(' ','_',$nurse->user->name)]) }}">{{ $nurse->user->name }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <!-- Progress track -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <!-- Title -->
                                <h5 class="h3 mb-0">اخر العمال المسجلين</h5>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush list my--3">
                                    @foreach(\App\Models\Laborer::limit(10)->get() as $laborer)
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar rounded-circle">
                                                        <img alt="Image placeholder" src="{{  $laborer->user->photo == 'default.png'
                                                                                     ? asset('Hospital/images/'.$laborer->user->user_type.'s/'.$laborer->user->photo)
                                                                                     : asset('Hospital/images/'.$laborer->user->photo) }}">
                                                    </a>
                                                </div>
                                                <div class="col ml--2">
                                                    <h6 class="mb-0">
                                                        <a href="{{ route('hospital.account.',['id'=>$laborer->user->id,str_replace(' ','_',$laborer->user->name)]) }}">{{ $laborer->user->name }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <!-- Progress track -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <!-- Title -->
                                <h5 class="h3 mb-0">اخر المحاسبين المسجلين</h5>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush list my--3">
                                    @foreach(\App\Models\Accountant::limit(10)->get() as $accountant)
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar rounded-circle">
                                                        <img alt="Image placeholder" src="{{  $accountant->user->photo == 'default.png'
                                                                                     ? asset('Hospital/images/'.$accountant->user->user_type.'s/'.$accountant->user->photo)
                                                                                     : asset('Hospital/images/'.$accountant->user->photo) }}">
                                                    </a>
                                                </div>
                                                <div class="col ml--2">
                                                    <h6 class="mb-0">
                                                        <a href="{{ route('hospital.account.',['id'=>$accountant->user->id,str_replace(' ','_',$accountant->user->name)]) }}">{{ $accountant->user->name }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <!-- Progress track -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <!-- Title -->
                                <h5 class="h6 mb-0">اخر موظفي الاستقبال المسجلين</h5>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush list my--3">
                                    @foreach(\App\Models\Receptionist::limit(10)->get() as $receptionist)
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar rounded-circle">
                                                        <img alt="Image placeholder" src="{{  $receptionist->user->photo == 'default.png'
                                                                                     ? asset('Hospital/images/'.$receptionist->user->user_type.'s/'.$receptionist->user->photo)
                                                                                     : asset('Hospital/images/'.$receptionist->user->photo) }}">
                                                    </a>
                                                </div>
                                                <div class="col ml--2">
                                                    <h6 class="mb-0">
                                                        <a href="{{ route('hospital.account.',['id'=>$receptionist->user->id,str_replace(' ','_',$receptionist->user->name)]) }}">{{ $receptionist->user->name }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h3 class="mb-0">اخر الفواتير المسجلة</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="name">المريض</th>
                                                <th scope="col" class="sort" data-sort="budget">رقم الفاتورة</th>
                                                <th scope="col" class="sort" data-sort="total">الاجمالي</th>
                                                <th scope="col" class="sort" data-sort="status">الحالة</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list">
                                            @foreach(\App\Models\Invoice::limit(10)->get() as $invoice)
                                                <tr>
                                                    <th>{{ $invoice->patient->name }}</th>
                                                    <th>{{ $invoice->invoice_number }}</th>
                                                    <th>{{ $invoice->total }}</th>
                                                    <th>{{ $invoice->payment_status }}</th>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection
@section('script')
    @include('Hospital.pages.settings.components.extends.repository.script')
@endsection
