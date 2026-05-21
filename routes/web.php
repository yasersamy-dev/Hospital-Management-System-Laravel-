<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController ;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Appointment\UserAppointmentController;
use App\Http\Controllers\ProfileController;

// Auth controllers
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
// Admin controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\PatientsController;
use App\Http\Controllers\Admin\SpecialtiesController;
use App\Http\Controllers\Admin\ProfilesController;
// Doctor controllers
use App\Http\Controllers\Doctor\DoctorDashboardController;


Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/contact',[ContactController::class,'Showcontact'])->name('contact.show');
Route::get('/specialties/{id}', [SpecialtyController::class, 'show'])->name('specialties.show');
Route::get('/specialties/{id}/doctors',[DoctorController::class,'showdoctors'])->name('doctors.show');

// Admin routes
Route::middleware(['auth','admin'])->group(function(){
Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

Route::get('/admin/profile',[ProfilesController::class,'show'])->name('admin.profile');
Route::put('/admin/profile',[ProfilesController::class,'update'])->name('admin.profile.update');

Route::resource('admin/users', UsersController::class);

Route::resource('admin/doctors', DoctorsController::class);

Route::get('admin/patients',[PatientsController::class,'index'])->name('patients.index');

Route::resource('admin/specialties', SpecialtiesController::class);
});

// doctor routes  
Route::middleware(['auth', 'doctor'])->prefix('doctor')->group(function () {
  Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('doctor.dashboard');
  Route::patch('/appointments/{appointment}', [DoctorDashboardController::class, 'update'])->name('doctor.appointments.update');

});

// profile routes
Route::middleware('auth')->group(function () {
Route::get('/profile/show',[ProfileController::class,'show'])->name('profile.show');
Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('/profile/update',[ProfileController::class,'update'])->name('profile.update');
// appointment routes
Route::get('/doctors/{doctor}/appointments/create',[AppointmentController::class,'create'])->name('appointments.create');
Route::post('/appointments',[AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments',[UserAppointmentController::class, 'show'])->name('appointments.show');
Route::get('/appointments/{id}/edit',[UserAppointmentController::class,'edit'])->name('appointments.edit');
Route::put('/appointments/{id}/update',[UserAppointmentController::class,'update'])->name('appointments.update');
Route::delete('/appointments/{appointment}',[UserAppointmentController::class, 'destroy'])->name('appointments.destroy');
});


// Auth routes

Route::get('/login',[AuthController::class,'showloginform'])->name('auth.showloginform');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'showregisterform'])->name('auth.showregisterform');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');


Route::get('forgot-password', [ForgotPasswordController::class,'showforgotform'])->name('password.forgot');
Route::post('forgot-password',[ForgotPasswordController::class,'sendresetlink'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class,'showresetform'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class,'resetpassword'])->name('password.update');

Route::get('/auth/redirect/{provider}', [SocialController::class,'redirect'])->name('social.redirect');
Route::get('/auth/callback/{provider}', [SocialController::class,'callback'])->name('social.callback');



