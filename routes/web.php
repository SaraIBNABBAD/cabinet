<?php

use App\Http\Controllers\admin\AdminRvController;
use App\Http\Controllers\admin\DocteurController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\assistant\AppointController;
use App\Http\Controllers\dashboard\AdminDashController;
use App\Http\Controllers\assistant\AsPatientController;
use App\Http\Controllers\dashboard\AssistantDashController;
use App\Http\Controllers\AuthentController;
use App\Http\Controllers\dashboard\PatientDashController;
use App\Http\Controllers\doctor\PatientController as DoctorPatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\dashboard\DoctorDashController;
use App\Http\Controllers\doctor\AppontController;
use App\Http\Controllers\doctor\FolderController;
use App\Http\Controllers\patient\AppPatntController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// dashboard route
Route::get('/dashboard', [AdminDashController::class,'templateAdmin'])->name('dashAdmin');
Route::get('/dash', [AdminDashController::class,'displayDash'])->name('dash');

Route::get('/dashAss', [AssistantDashController::class,'templateAssistant'])->name('dashAssistant');
Route::get('/listDoc', [AssistantDashController::class, 'displayDoc'])->name('listdoc');

Route::get('/dashP', [PatientDashController::class, 'templatePatient'])->name('dashPatient');
Route::get('/myDoc', [PatientDashController::class, 'displayDoc'])->name('myDoc');

Route::get('/dashD', [DoctorDashController::class,'templateDoctor'])->name('dashDoctor');



// view signup & login route
Route::get('/auth', [AuthentController::class, 'displaySignup'])->name('signup');
Route::get('/log', [AuthentController::class, 'displayLogin'])->name('login');
// signup & login operation route
Route::post('/register', [AuthentController::class, 'signup'])->name('register');
Route::post('/login', [AuthentController::class, 'login'])->name('selog');

// logout route
Route::get('/logout', [AuthentController::class, 'logout'])->name('logout');

// crud route -> admin
Route::resource('/doctors', DocteurController::class);
Route::resource('/patients', PatientController::class);
Route::resource('/staffs', StaffController::class);
Route::resource('/adApp', AdminRvController::class);

// crud route -> assistant
Route::resource('/Apatient',AsPatientController::class);
Route::resource('/asPoint', AppointController::class);

// crud route -> doctor
Route::resource('/Dpatient', DoctorPatientController::class);
Route::resource('/docApp', AppontController::class);
Route::resource('/dFolder', FolderController::class);
 
// crud route -> patient
Route::resource('/rendezVous', AppPatntController::class);

// forget password route
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



