<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
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

//register
Route::get('/register', [CustomAuthController::class, 'register']);
Route::post('/register-script', [CustomAuthController::class, 'registerScript'])->name("register-script");


//login
Route::get('/login', [CustomAuthController::class, 'login']);
Route::post('/login-script', [CustomAuthController::class, 'loginScript'])->name("login-script");

//MO
Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('/mo_dashboard', [CustomAuthController::class, 'mo_dashboard']);
Route::get('/doctor_view', [CustomAuthController::class, 'doctor_view']);
Route::get('update_doctors/{id}', [CustomAuthController::class, 'updateDoctors']);
Route::get('delete/{id}', [CustomAuthController::class, 'delete']);
Route::post('/admin-update-script', [CustomAuthController::class, 'adminUpdateScript'])->name("admin-update-script");

//employee
Route::post('/update-script', [CustomAuthController::class, 'updateScript'])->name("update-script");
Route::get('view_patients/{id}', [CustomAuthController::class, 'viewPatients']);

//patient
Route::get('patient_registration/{id}', [CustomAuthController::class, 'patientRegistration']);
Route::post('/patient-register-script', [CustomAuthController::class, 'patientRegisterScript'])->name("patient-register-script");
Route::get('assign-patient/{id}', [CustomAuthController::class, 'assignPatient']);
Route::post('/assign-patient-script', [CustomAuthController::class, 'assignPatientScript'])->name("assign-patient-script");


// Route::get('/register', 'RegistrationController@create');
// Route::post('register', 'RegistrationController@store');
