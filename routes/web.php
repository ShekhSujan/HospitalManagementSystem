<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
  'login' => false, // Registration Routes...
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/admin-login', 'Auth\AdminLoginController@admin_login')->name('admin_login');
 Route::post('/admin-login', 'Auth\AdminLoginController@login')->name('admin_login');
Route::get('/', 'Backend\DashboardController@index')->name('dashboard')->middleware("auth:admin");

//-##################- Dashboard CRUD  Start ####################-->
Route::prefix("/dashboard")->name("backend.")->middleware("auth:admin")->group(function() {
   Route::get('/unauthorized', 'backend\DashboardController@unauthorized')->name('unauthorized');
  Route::post('/newAppointment', 'Backend\UsersController@newAppointment')->name('newAppointment');
  Route::get('/cache', 'Backend\DashboardController@cache')->name('cache');
  Route::post('/medicine-store', 'Backend\JsonController@medicine_store')->name('medicine_store');
  Route::post('/checkpatient', 'Backend\JsonController@checkPatient')->name('check_patient');

  //Petient Report
  Route::get('/create-appointment-booking-report', 'Backend\ReportController@create_appointment_booking_report')->name('create_appointment_booking_report');
  Route::get('/view-appointment-booking-report', 'Backend\ReportController@view_appointment_booking_report')->name('view_appointment_booking_report');
  Route::get('/create-appointment-checkup-report', 'Backend\ReportController@create_appointment_checkup_report')->name('create_appointment_checkup_report');
  Route::get('/view-appointment-checkup-report', 'Backend\ReportController@view_appointment_checkup_report')->name('view_appointment_checkup_report');
  Route::get('/create-appointment-payment-report', 'Backend\ReportController@create_appointment_payment_report')->name('create_appointment_payment_report');
  Route::get('/view-appointment-payment-report', 'Backend\ReportController@view_appointment_payment_report')->name('view_appointment_payment_report');

  Route::get('/create-patient-report', 'Backend\ReportController@create_patient_report')->name('create_patient_report');
  Route::get('/view-patient-report', 'Backend\ReportController@view_patient_report')->name('view_patient_report');

  Route::get('/create-patient-payment-report', 'Backend\ReportController@create_patient_payment_report')->name('create_patient_payment_report');
  Route::get('/view-patient-payment-report', 'Backend\ReportController@view_patient_payment_report')->name('view_patient_payment_report');

  Route::get('/doctor-report', 'Backend\DoctorController@doctor_report')->name('doctor_report');


  Route::get('/doc/{speciality_id}','Backend\JsonController@doc');

  //#################  Status update #################

  Route::post('/admins-status','Backend\AdminsController@admins_status_update')->name('admins_status');
  Route::post('/doctor-status','Backend\DoctorController@doctor_status_update')->name('doctor_status');
  Route::post('/medicine-status','Backend\MedicineController@medicine_status_update')->name('medicine_status');
  Route::post('/designation-status','Backend\DesignationController@designation_status_update')->name('designation_status');
  Route::post('/department-status','Backend\DepartmentController@department_status_update')->name('department_status');
  Route::post('/education-status','Backend\EducationController@education_status_update')->name('education_status');
  Route::post('/speciality-status','Backend\SpecialityController@speciality_status_update')->name('speciality_status');

  //#################  Status update #################

  Route::get('/cart/add/{id}', 'Backend\CartController@addCart')->name('cart.add');
  Route::get('/cart/remove/{rowId}', 'Backend\CartController@removeCart')->name('cart.remove');
  Route::get('/cart/update/{rowId?}', 'Backend\CartController@updateCart')->name('cart.update');
  Route::get('/pos/report', 'Backend\PosController@report')->name('pos.report');
  //#################  Pos End #################
  Route::get('/employee/report', 'Backend\EmployeeController@report')->name('employee.report');
  Route::get('/employee/report/view', 'Backend\EmployeeController@report_view')->name('employee.report.view');

  //#################  User Balance #################
  Route::post('/add-balance','Backend\UsersController@add_balance')->name('add_balance');
  Route::post('/add-charges','Backend\UsersController@add_charges')->name('add_charges');
  Route::get('/admitted-patient','Backend\UsersController@admitted_patient')->name('admitted_patient');
  Route::get('/discharged-patient','Backend\UsersController@discharged_patient')->name('discharged_patient');
  Route::get('/patient-report','Backend\UsersController@discharged_patient')->name('discharged_patient');

  $arr = [

    "customer" => "Backend\CustomerController",
    "pos" => "Backend\PosController",
    "stock" => "Backend\StockController",
    "education" => "Backend\EducationController",
    "department" => "Backend\DepartmentController",
    "employee" => "Backend\EmployeeController",
    "ward-bed" => "Backend\WardBedController",
    "designation" => "Backend\DesignationController",
    "speciality" => "Backend\SpecialityController",
    "admins" => "Backend\AdminsController",
    "doctor" => "Backend\DoctorController",
    "users" => "Backend\UsersController",
    "appointment" => "Backend\AppointmentController",
    "setting" => "Backend\SettingController",
    "medicine" => "Backend\MedicineController",

  ];
  foreach ($arr as $key => $value) {
    Route::get("/{$key}", "{$value}@index")->name("{$key}.index");
    Route::get("/{$key}/create", "{$value}@create")->name("{$key}.create");
    Route::get("/{$key}/add/{user_id}", "{$value}@add")->name("{$key}.add");
    Route::post("/{$key}", "{$value}@store")->name("{$key}.store");
    Route::post("/{$key}/excel-store", "{$value}@excel_store")->name("{$key}.excel_store");
    Route::get("/{$key}/edit/{id}", "{$value}@edit")->name("{$key}.edit");
    Route::post("/{$key}/update", "{$value}@update")->name("{$key}.update");
    Route::post("/{$key}/delete", "{$value}@destroy")->name("{$key}.destroy");
    Route::post("/{$key}/bulk-delete", "{$value}@bulk_destroy")->name("{$key}.bulk_destroy");
    Route::get("/{$key}/view/{id}", "{$value}@view")->name("{$key}.view");
  }
});
