<?php

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');

// Route::get('/home/customer', [App\Http\Controllers\HomeController::class, 'customer'])->middleware('user','fireauth');

Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');

Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);

Route::resource('/img', App\Http\Controllers\ImageController::class);

Route::resource('/dashboard', App\Http\Controllers\DashboardController::class);

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees')->middleware('user','fireauth');

Route::get('/empStats', [App\Http\Controllers\EmpStatsController::class, 'index'])->name('empStats')->middleware('user','fireauth');

Route::post('/process', 'App\Http\Controllers\ProcessController@store');

Route::post('/deleteEmp', 'App\Http\Controllers\ProcessController@delete');
