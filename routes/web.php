<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin', function () {
    return view('admin');
})->middleware('auth')->name('admin');


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');


Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('login.logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->middleware('guest')->name('forgot-password.create');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('forgot-password.store');
Route::post('/reset-password', [ResetPasswordController::class, 'create'])->middleware('guest')->name('password.reset');