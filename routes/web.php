<?php


use App\Http\Controllers\admin\DocteurController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\dashboard\AdminDashController;
use App\Http\Controllers\assistant\AsPatientController;
use App\Http\Controllers\dashboard\AssistantDashController;
use App\Http\Controllers\AuthentController;
use App\Http\Controllers\dashboard\PatientDashController;
use App\Http\Controllers\doctor\PatientController as DoctorPatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
Route::get('/dashboard', [AdminDashController::class,'templateAdmin'])->name('dashAdmin');
Route::get('/dashAss', [AssistantDashController::class,'templateAssistant'])->name('dashAssistant');
Route::get('/dashP', [PatientDashController::class, 'templatePatient'])->name('dashPatient');
Route::get('/dashD', [DoctorDashController::class],'templateDoctor')->name('dashDoctor');
Route::get('/dash', [AdminDashController::class,'displayDash'])->name('dash');
Route::get('/auth', [AuthentController::class, 'displaySignup'])->name('signup');
Route::get('/log', [AuthentController::class, 'displayLogin'])->name('login');
Route::post('/register', [AuthentController::class, 'signup'])->name('register');
Route::post('/login', [AuthentController::class, 'login'])->name('selog');
Route::get('/logout', [AuthentController::class, 'logout'])->name('logout');
Route::resource('/doctors', DocteurController::class);
Route::resource('/patients', PatientController::class);
Route::resource('/staffs', StaffController::class);


  
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::resource('/Apatient',AsPatientController::class);
Route::resource('/Dpatient', DoctorPatientController::class);

