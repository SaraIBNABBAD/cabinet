<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\AdminRvController;
use App\Http\Controllers\admin\DocteurController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\doctor\AppontController;
use App\Http\Controllers\doctor\FolderController;
use App\Http\Controllers\dashboard\CalculController;
use App\Http\Controllers\patient\AppPatntController;
use App\Http\Controllers\assistant\AppointController;
use App\Http\Controllers\doctor\PatientDocController;
use App\Http\Controllers\assistant\AsPatientController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\dashboard\AdminDashController;
use App\Http\Controllers\dashboard\DoctorDashController;
use App\Http\Controllers\dashboard\PatientDashController;
use App\Http\Controllers\dashboard\AssistantDashController;
use App\Http\Controllers\dashboard\DashStatController;
use App\Http\Controllers\TeamController;


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



Route::middleware('auth')->group(function () {
    Route::middleware('role:Admin')->group(function () {

        //dash Admin
        Route::get('/templteboard', [AdminDashController::class, 'templateAdmin'])->name('dashAdmin');
        Route::get('/dash', [AdminDashController::class, 'displayDash'])->name('dashAd');
        // crud route -> admin
        Route::resource('/doctors', DocteurController::class);
        Route::resource('/patients', PatientController::class);
        Route::resource('/staffs', StaffController::class);
        Route::resource('/adApp', AdminRvController::class);

        // Profile route
        Route::controller(AdminDashController::class)->group(function () {
            Route::get('/admin/profile', 'Profile')->name('admin.profile');
            Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
            Route::post('/store/profile', 'EditedProfile')->name('edited.profile');
        });

        // Admin State route
        Route::controller(DashStatController::class)->group(function () {
            Route::get('/admin/state', 'State')->name('admin.state');
        });
    });
    Route::middleware('role:Doctor')->group(function () {

        // dash doctor
        Route::get('/templteD', [DoctorDashController::class, 'templateDoctor'])->name('dashDoctor');
        // crud route -> doctor
        Route::resource('/Dpatients', PatientDocController::class);
        Route::resource('/docApp', AppontController::class);
        Route::resource('/dFolder', FolderController::class);
        // Profile Doctor route
        Route::controller(DoctorDashController::class)->group(function () {
            Route::get('/doc/profile', 'ProfileDoc')->name('doc.profile');
            Route::get('/edit/profileDoc', 'EditProfileDoc')->name('edit.profileDoc');
            Route::post('/store/profileDoc', 'EditedProfileDoc')->name('edited.profileDoc');
        });
    });
    Route::middleware('role:Assistant')->group(function () {
        //dash Assistant
        Route::get('/templteAss', [AssistantDashController::class, 'templateAssistant'])->name('dashAssistant');
        Route::get('/listDoc', [AssistantDashController::class, 'displayDoc'])->name('listdoc');
        // crud route -> assistant
        Route::resource('/Apatient', AsPatientController::class);
        Route::resource('/asPoint', AppointController::class);
        // Profile Assist route
        Route::controller(AssistantDashController::class)->group(function () {
            Route::get('/assist/profile', 'ProfileAss')->name('assist.profile');
            Route::get('/edit/profileAss', 'EditProfileAss')->name('edit.profileAss');
            Route::post('/store/profileAss', 'EditedProfileAss')->name('edited.profileAss');
        });
    });
    Route::middleware(['role:Patient'])->group(function () {
        // dash Patient
        Route::get('/templteP', [PatientDashController::class, 'templatePatient'])->name('dashPatient');
        Route::get('/dashP', [PatientDashController::class, 'dispalyDash'])->name('dashP');
        Route::get('/myDoc', [PatientDashController::class, 'displayDoc'])->name('myDoc');
        Route::get('/folder', [PatientDashController::class, 'displayFolder'])->name('folder');
        // crud route -> patient
        Route::resource('/rendezVous', AppPatntController::class);
        // Profile Patient route
        Route::controller(PatientDashController::class)->group(function () {
            Route::get('/patnt/profile', 'ProfilePatnt')->name('patnt.profile');
            Route::get('/edit/profilePatnt', 'EditProfilePatnt')->name('edit.profilePatnt');
            Route::post('/store/profilePatnt', 'EditedProfilePatnt')->name('edited.profilePatnt');
        });
    });
    // logout route
    Route::get('/logout', [AuthentController::class, 'logout'])->name('logout');
});


// view signup & login route
Route::get('/auth', [AuthentController::class, 'displaySignup'])->name('signup');
Route::get('/log', [AuthentController::class, 'displayLogin'])->name('login');
// signup & login operation route
Route::post('/register', [AuthentController::class, 'signup'])->name('register');
Route::post('/login', [AuthentController::class, 'login'])->name('selog');


// forget password route
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');




// Profile route
Route::controller(AdminDashController::class)->group(function () {
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'EditedProfile')->name('edited.profile');
});




// Search route (Admin)
Route::get('/search', 'App\Http\Controllers\admin\PatientController@search')->name('searchPatnt');
Route::get('/searchDoc', 'App\Http\Controllers\admin\DocteurController@searchDoc')->name('searchDoc');
Route::get('/searchAppont', 'App\Http\Controllers\admin\AdminRvController@searchAppont')->name('searchAppont');
Route::get('/serachStaff', [StaffController::class, 'searchStaff'])->name('searchStaff');

// Search route (Doctor)
Route::get('/searchAppntDoc', [AppontController::class, 'searchAppont'])->name('srchApptDoc');
Route::get('/searchPtntDoc', [PatientDocController::class, 'searchPatnt'])->name('srchPatntDoc');
Route::get('/serachFolder', [FolderController::class, 'searchFolder'])->name('srchFolder');

// Search route (Assistant)
Route::get('/searchPtntAss', [AsPatientController::class, 'searching'])->name('srchPatntAss');
Route::get('/searchAppAss', [AppointController::class, 'searchAppont'])->name('srchAppntAss');
Route::get('/searchDocAss', [AssistantDashController::class, 'searchingDoc'])->name('srchDocAss');

// Search route (Patient)
Route::get('/searchPtntApp', [AppPatntController::class, 'searchAppont'])->name('srchAppntPatnt');
Route::get('/searchPtntDoc', [PatientDashController::class, 'searchdocs'])->name('srchDocPatnt');
Route::get('/searchPtntFold', [PatientDashController::class, 'searchFolder'])->name('srchFolderPatnt');

// Affichage docteurs
Route::get('/', [TeamController::class, 'Team'])->name('Team');
