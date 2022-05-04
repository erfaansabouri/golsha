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
    return view('app');
})->name('home');

Route::get('/contact-us', function () {
    return view('pages.contact-us');
});

Route::get('/about-us', function () {
	return view('pages.about-us');
});

Route::prefix('admin')->group(function () {
	// Auth
	Route::prefix('auth')->group(function () {
		Route::get('login', [ \App\Http\Controllers\Admin\AuthController::class , 'loginForm'])->name('admin.auth.login.form');
		Route::post('login', [ \App\Http\Controllers\Admin\AuthController::class , 'login'])->name('admin.auth.login');
		Route::any('logout', [ \App\Http\Controllers\Admin\AuthController::class , 'logout'])->name('admin.auth.logout');
	});
	
	// Dashboard
	Route::prefix('dashboard')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Admin\DashboardController::class , 'index'])->name('admin.dashboard.index');
	});
});