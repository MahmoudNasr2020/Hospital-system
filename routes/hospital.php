<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'login','namespace'=>'Login','middleware'=>'guest','as'=>'login.'],function (){
    Route::get('/','LoginController@index')->name('index');
    Route::post('/','LoginController@login')->name('login');
});

//maintenance
Route::get('/maintenance',function (){
    return view('Hospital.pages.maintenance');
})->name('maintenance')->middleware('works');

Route::group(['middleware'=>['auth','status','maintenance']],function (){

    //logout
    Route::group(['namespace'=>'Login'],function (){
        Route::post('/logout','LoginController@logout')->name('logout');
    });

    //callback payment
    Route::get('/invoices/callback','Invoice\InvoiceController@callback')->name('callback');

    //home
    Route::get('/home','Home\HomeController@index')->name('home');


    //Department
    Route::group(['prefix'=>'departments','namespace'=>'Department','as'=>'department.'],function (){
        Route::get('/','DepartmentController@index');
        Route::post('/add','DepartmentController@store')->name('add');
        Route::get('/show/{id}','DepartmentController@show')->name('show');
        Route::get('/edit/{id}','DepartmentController@edit')->name('edit');
        Route::post('/update','DepartmentController@update')->name('update');
        Route::delete('/delete/{id}','DepartmentController@delete')->name('delete');
        Route::post('/multi_delete','DepartmentController@multi_delete')->name('multi_delete');
    });

    //Doctor
    Route::group(['prefix'=>'doctors','namespace'=>'Doctor','as'=>'doctor.'],function (){
        Route::get('/','DoctorController@index');
        Route::get('/create','DoctorController@create')->name('create');
        Route::post('/add','DoctorController@store')->name('add');
        Route::get('/show/{id}/{name?}','DoctorController@show')->name('show');
        Route::get('/edit/{id}/{name?}','DoctorController@edit')->name('edit');
        Route::post('/update/{id}','DoctorController@update')->name('update');
        Route::delete('/delete/{id}','DoctorController@delete')->name('delete');
        Route::post('/multi_delete','DoctorController@multi_delete')->name('multi_delete');
        Route::post('/status','DoctorController@status')->name('status');
    });

    //Nurse
    Route::group(['prefix'=>'nurses','namespace'=>'Nurse','as'=>'nurse.'],function (){
        Route::get('/','NurseController@index');
        Route::get('/create','NurseController@create')->name('create');
        Route::post('/add','NurseController@store')->name('add');
        Route::get('/show/{id}/{name?}','NurseController@show')->name('show');
        Route::get('/edit/{id}/{name?}','NurseController@edit')->name('edit');
        Route::post('/update/{id}','NurseController@update')->name('update');
        Route::delete('/delete/{id}','NurseController@delete')->name('delete');
        Route::post('/multi_delete','NurseController@multi_delete')->name('multi_delete');
        Route::post('/status','NurseController@status')->name('status');

    });

    //Laborer
    Route::group(['prefix'=>'laborers','namespace'=>'Laborer','as'=>'laborer.'],function (){
        Route::get('/','LaborerController@index');
        Route::get('/create','LaborerController@create')->name('create');
        Route::post('/add','LaborerController@store')->name('add');
        Route::get('/show/{id}/{name?}','LaborerController@show')->name('show');
        Route::get('/edit/{id}/{name?}','LaborerController@edit')->name('edit');
        Route::post('/update/{id}','LaborerController@update')->name('update');
        Route::delete('/delete/{id}','LaborerController@delete')->name('delete');
        Route::post('/multi_delete','LaborerController@multi_delete')->name('multi_delete');
        Route::post('/status','LaborerController@status')->name('status');
    });


    //Accountant
    Route::group(['prefix'=>'accountants','namespace'=>'Accountant','as'=>'accountant.'],function (){
        Route::get('/','AccountantController@index');
        Route::get('/create','AccountantController@create')->name('create');
        Route::post('/add','AccountantController@store')->name('add');
        Route::get('/show/{id}/{name?}','AccountantController@show')->name('show');
        Route::get('/edit/{id}/{name?}','AccountantController@edit')->name('edit');
        Route::post('/update/{id}','AccountantController@update')->name('update');
        Route::delete('/delete/{id}','AccountantController@delete')->name('delete');
        Route::post('/multi_delete','AccountantController@multi_delete')->name('multi_delete');
        Route::post('/status','AccountantController@status')->name('status');

    });


    //Receptionis
    Route::group(['prefix'=>'receptionists','namespace'=>'Receptionist','as'=>'receptionist.'],function (){
        Route::get('/','ReceptionistController@index');
        Route::get('/create','ReceptionistController@create')->name('create');
        Route::post('/add','ReceptionistController@store')->name('add');
        Route::get('/show/{id}/{name?}','ReceptionistController@show')->name('show');
        Route::get('/edit/{id}/{name?}','ReceptionistController@edit')->name('edit');
        Route::post('/update/{id}','ReceptionistController@update')->name('update');
        Route::delete('/delete/{id}','ReceptionistController@delete')->name('delete');
        Route::post('/multi_delete','ReceptionistController@multi_delete')->name('multi_delete');
        Route::post('/status','ReceptionistController@status')->name('status');

    });


    //Doctor
    Route::group(['prefix'=>'patients','namespace'=>'Patient','as'=>'patient.'],function (){
        Route::get('/','PatientController@index');
        Route::get('/create','PatientController@create')->name('create');
        Route::post('/add','PatientController@store')->name('add');
        Route::get('/show/{id}/{name?}','PatientController@show')->name('show');
        Route::get('/edit/{id}/{name?}','PatientController@edit')->name('edit');
        Route::post('/update/{id}','PatientController@update')->name('update');
        Route::delete('/delete/{id}','PatientController@delete')->name('delete');
        Route::post('/multi_delete','PatientController@multi_delete')->name('multi_delete');
    });

    //Roles
    Route::group(['prefix'=>'roles','namespace'=>'Role','as'=>'role.'],function (){
        Route::get('/','RoleController@index');
        Route::get('/create','RoleController@create')->name('create');
        Route::post('/add','RoleController@store')->name('add');
        Route::get('/show/{id}/{name?}','RoleController@show')->name('show');
        Route::get('/edit/{id}/{name?}','RoleController@edit')->name('edit');
        Route::post('/update/{id}','RoleController@update')->name('update');
        Route::delete('/delete/{id}','RoleController@delete')->name('delete');
        Route::post('/multi_delete','RoleController@multi_delete')->name('multi_delete');
        Route::post('/status','RoleController@status')->name('status');

    });


    //Admins
    Route::group(['prefix'=>'admins','namespace'=>'Admin','as'=>'admin.'],function (){
        Route::get('/','AdminController@index');
        Route::get('/create','AdminController@create')->name('create');
        Route::post('/add','AdminController@store')->name('add');
        Route::get('/show/{id}/{name?}','AdminController@show')->name('show');
        Route::get('/edit/{id}/{name?}','AdminController@edit')->name('edit');
        Route::post('/update/{id}','AdminController@update')->name('update');
        Route::delete('/delete/{id}','AdminController@delete')->name('delete');
        Route::post('/multi_delete','AdminController@multi_delete')->name('multi_delete');
        Route::post('/status','AdminController@status')->name('status');

    });


    //Room
    Route::group(['prefix'=>'rooms','namespace'=>'Room','as'=>'room.'],function (){
        Route::get('/','RoomController@index');
        Route::post('/add','RoomController@store')->name('add');
        Route::get('/show/{id}','RoomController@show')->name('show');
        Route::get('/edit/{id}','RoomController@edit')->name('edit');
        Route::post('/update','RoomController@update')->name('update');
        Route::delete('/delete/{id}','RoomController@delete')->name('delete');
        Route::post('/multi_delete','RoomController@multi_delete')->name('multi_delete');
    });

    //Assign_Room
    Route::group(['prefix'=>'assign_rooms','namespace'=>'AssignRoom','as'=>'assign_room.'],function (){
        Route::get('/','AssignRoomController@index');
        Route::post('/add','AssignRoomController@store')->name('add');
        Route::get('/show/{id}','AssignRoomController@show')->name('show');
        Route::get('/edit/{id}','AssignRoomController@edit')->name('edit');
        Route::post('/update','AssignRoomController@update')->name('update');
        Route::delete('/delete/{id}','AssignRoomController@delete')->name('delete');
        Route::post('/multi_delete','AssignRoomController@multi_delete')->name('multi_delete');
        Route::get('/show_rooms','AssignRoomController@show_rooms')->name('show_rooms');
    });

    //Report
    Route::group(['prefix'=>'reports','namespace'=>'Report','as'=>'report.'],function (){
        Route::get('/patients','ReportController@indexPatient')->name('patient');
        Route::get('/{id}/{name?}','ReportController@index');
        Route::get('/create/{id}/{name?}','ReportController@create')->name('create');
        Route::post('/add','ReportController@store')->name('add');
        Route::get('/show/{id}/{name?}','ReportController@show')->name('show');
        Route::get('/edit/{id}/{name?}','ReportController@edit')->name('edit');
        Route::post('/update','ReportController@update')->name('update');
        Route::delete('/delete/{id}','ReportController@delete')->name('delete');
        Route::post('/multi_delete','ReportController@multi_delete')->name('multi_delete');
        //Route::get('/show_rooms','ReportController@show_rooms')->name('show_rooms');
    });

    //Invoices
    Route::group(['prefix'=>'invoices','namespace'=>'Invoice','as'=>'invoice.'],function (){
        Route::get('/patients','InvoiceController@indexPatient')->name('patient');
        Route::get('/{id}/{name?}','InvoiceController@index')->name('index');
        Route::get('/create/{id}/{name?}','InvoiceController@create')->name('create');
        Route::post('/add','InvoiceController@store')->name('add');
        Route::post('/pay','InvoiceController@pay')->name('pay');
        Route::post('/payCache','InvoiceController@payCache')->name('payCache');
        Route::post('/payOnline','InvoiceController@payOnline')->name('payOnline');
        Route::get('/show/{id}/{name?}','InvoiceController@show')->name('show');
        Route::post('/edit','InvoiceController@edit')->name('edit');
        Route::post('/update','InvoiceController@update')->name('update');
        Route::delete('/delete/{id}','InvoiceController@delete')->name('delete');
        Route::post('/multi_delete','InvoiceController@multi_delete')->name('multi_delete');
        //Route::get('/show_rooms','ReportController@show_rooms')->name('show_rooms');
    });

    //MonthSalary
    Route::group(['prefix'=>'monthsalaries','namespace'=>'MonthSalary','as'=>'monthsalary.'],function (){
        Route::get('/','MonthSalaryController@index');
        Route::post('/add','MonthSalaryController@store')->name('add');
        Route::get('/show/{id}','MonthSalaryController@show')->name('show');
        Route::get('/edit/{id}','MonthSalaryController@edit')->name('edit');
        Route::post('/update','MonthSalaryController@update')->name('update');
        Route::delete('/delete/{id}','MonthSalaryController@delete')->name('delete');
        Route::post('/multi_delete','MonthSalaryController@multi_delete')->name('multi_delete');
    });

    //Salary
    Route::group(['prefix'=>'salaries','namespace'=>'Salary','as'=>'salary.'],function (){
        Route::get('/{month}','SalaryController@index');
        Route::post('/search','SalaryController@search')->name('search');
        Route::post('/pay','SalaryController@pay')->name('pay');
        Route::post('/cashing','SalaryController@cashing')->name('cashing');
        Route::post('/delete_pay','SalaryController@delete_pay')->name('delete_pay');
    });

    //Attendance
    Route::group(['prefix'=>'attendances','namespace'=>'Attendance','as'=>'attendance.'],function (){
        Route::get('/','AttendanceController@index');
        Route::post('/search','AttendanceController@search')->name('search');
        Route::post('/assign_attendance','AttendanceController@assign_attendence')->name('assign_attendance');
        Route::post('/cashing','AttendanceController@cashing')->name('cashing');
        Route::post('/delete_pay','AttendanceController@delete_pay')->name('delete_pay');
    });


    //Chat
   /* Route::group(['prefix'=>'chat','namespace'=>'Message','as'=>'message.'],function (){
        Route::get('/','MessageController@index');
        Route::post('/search','MessageController@search')->name('search');
        Route::post('/send','MessageController@send')->name('send');
        Route::post('/assign_attendance','MessageController@assign_attendence')->name('assign_attendance');
        Route::post('/cashing','MessageController@cashing')->name('cashing');
        Route::post('/delete_pay','MessageController@delete_pay')->name('delete_pay');
    });*/

    //Account
    Route::group(['prefix'=>'/account','namespace'=>'Account','as'=>'account.'],function (){
        Route::get('/{id}/{name?}','AccountController@index');
    });

    //Settings
    Route::group(['prefix'=>'/setting','namespace'=>'Setting','as'=>'setting.'],function (){
        Route::get('/','SettingController@index')->name('index');
        Route::post('/update','SettingController@update')->name('update');
    });

});


