<?php


use App\Http\Controllers\admin\DocteurController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\AuthentController;
use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', [AdminDashController::class,'templateAdmin'])->name('dashboardAdmin');
Route::get('/dash', [AdminDashController::class,'displayDash'])->name('dash');
Route::get('/auth', [AuthentController::class, 'displaySignup'])->name('signup');
Route::get('/log', [AuthentController::class, 'displayLogin'])->name('login');
Route::post('/register', [AuthentController::class, 'signup'])->name('register');
Route::post('/login', [AuthentController::class, 'login'])->name('selog');
Route::get('/logout', [AuthentController::class, 'logout'])->name('logout');
Route::resource('/doctors', DocteurController::class);
Route::resource('/patients', PatientController::class);
Route::resource('/staffs', StaffController::class);
