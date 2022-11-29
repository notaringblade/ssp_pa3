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

Route::get('/register', [CustomAuthController::class, 'register']);
Route::get('/login', [CustomAuthController::class, 'login']);
Route::post('/register-script', [CustomAuthController::class, 'registerScript'])->name("register-script");
Route::post('/login-script', [CustomAuthController::class, 'loginScript'])->name("login-script");
Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('/mo_dashboard', [CustomAuthController::class, 'mo_dashboard']);



// Route::get('/register', 'RegistrationController@create');
// Route::post('register', 'RegistrationController@store');
