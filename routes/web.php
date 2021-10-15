<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RestController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListSpecialistController;
use App\Http\Middleware\CheckLoginCustomer;
use App\Http\Controllers\InfoDoctorController;
use App\Http\Controllers\ListDoctorController;
use App\Http\Controllers\InfoSpecialistController;
use App\Http\Controllers\ListAppointmentController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\NewDetailController;
use App\Http\Controllers\ListNewsController;
use App\Http\Controllers\UpdateCustomerController;
use App\Http\Middleware\CheckLoginDoctor;
use App\Http\Controllers\LoginDoctorController;
use App\Http\Controllers\InformationDoctorController;
use App\Http\Controllers\InfoAppointmentController;
use App\Http\Controllers\InfoRestController;





//admin
Route::get('/admin/login', [LoginController::class, 'login'])->name("login");
Route::post('/admin/login-process', [LoginController::class, 'loginProcess'])->name("login-process");

//Middleware
Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('specialist', SpecialistController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('doctor', DoctorController::class);
    Route::resource('time', TimeController::class);
    Route::resource('news', NewsController::class);
    Route::resource('appointment', AppointmentController::class);
    Route::resource('rest', RestController::class);
    Route::resource('statistical', StatisticalController::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


//doctor

Route::get('/login-doctor', [LoginDoctorController::class, 'login'])->name("login-doctor");
Route::post('/login-process-doctor', [LoginDoctorController::class, 'loginProcess'])->name('login-process-doctor');

Route::middleware([CheckLoginDoctor::class])->group(function () {
    Route::get('/dashboard-doctor', function () {
        return view('doctor.dashboard');
    })->name('dashboard-doctor');
    Route::resource('info-doctor-admin', InformationDoctorController::class);
    Route::resource('info-appointment', InfoAppointmentController::class);
    Route::resource('info-rest', InfoRestController::class);
    Route::get('/edit-password', [InformationDoctorController::class, 'change_password']);
    Route::post('/process-edit-password/{id_doctor}', [InformationDoctorController::class, 'update_password']);
    Route::get('doctor/logout', [LoginDoctorController::class, 'logout'])->name('logout-doctor');


});
//user

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/user/login', [UserController::class, 'login'])->name("login-customer");
Route::post('/user/login-process', [UserController::class, 'loginProcess'])->name("login-process-customer");
Route::resource('/user/register', RegisterController::class);
Route::get('/list-specialist', [ListSpecialistController::class, 'index'])->name("list-specialist");
Route::get('/info-doctor/{id_doctor}', [InfoDoctorController::class, 'index'])->name("info-doctor");
Route::get('/list-doctor', [ListDoctorController::class, 'index'])->name("list-doctor");
Route::get('/list-doctor/{id_specialist}', [ListDoctorController::class, 'list_doctor']);
Route::get('/info-specialist/{id_specialist}', [InfoSpecialistController::class, 'index'])->name("info-specialist");
Route::get('/news-details/{id_news}', [NewDetailController::class, 'index'])->name("news-details");
Route::get('/list-news', [ListNewsController::class, 'index'])->name("list-news");


//middleware
Route::middleware([CheckLoginCustomer::class])->group(function () {
    Route::post('/process', [InfoDoctorController::class, 'store'])->name("process");
    Route::get('/user/logout', [UserController::class, 'logout'])->name('logout-customer');
    Route::get('/list-appointment', [ListAppointmentController::class, 'index'])->name("list-appointment");
    Route::get('/user/customer/{id_customer}', [UpdateCustomerController::class, 'index']);
    Route::post('/user/customer-update/{id_customer}', [UpdateCustomerController::class, 'update']);
    Route::get('/user/change-password', [UpdateCustomerController::class, 'change_password']);
    Route::post('/user/process-change-password/{id_customer}', [UpdateCustomerController::class, 'update_password']);
});
