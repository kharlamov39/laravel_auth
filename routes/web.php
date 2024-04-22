<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\DishController;

use App\Http\Controllers\Public\MenuController;


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


Route::get('/', [MenuController::class, 'index'])->name('public.index');

Route::prefix('/register')->middleware('guest')->group( function() {
    Route::get('', [RegisterController::class, 'index'])->name('register.index');
    Route::post('', [RegisterController::class, 'store'])->name('register.store');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('login.logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->middleware('guest')->name('forgot-password.create');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('forgot-password.store');
Route::get('/reset-password', [ResetPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.reset.store');


Route::get('/email/verify', [VerifyEmailController::class, 'index'])->middleware('auth')->name('verification.notice');
Route::post('/email/verify', [VerifyEmailController::class, 'send'])->middleware('auth')->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');


/* Маршруты для категорий блюд */
Route::prefix('/admin/groups')->middleware('auth')->group( function() {
    Route::get('', [GroupController::class, 'index'])->name('admin.groups.index');
    Route::get('/create', [GroupController::class, 'create'])->name('admin.groups.create');
    Route::post('/create', [GroupController::class, 'store'])->name('admin.groups.store');
    Route::delete('/{id}', [GroupController::class, 'delete'])->name('admin.groups.delete');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('admin.groups.edit');
    Route::put('/{id}', [GroupController::class, 'update'])->name('admin.groups.update');
});

/* Маршруты для блюд */
Route::prefix('/admin/dishes')->middleware('auth')->group( function() {
    Route::get('', [DishController::class, 'index'])->name('admin.dishes.index');
    Route::get('/create', [DishController::class, 'create'])->name('admin.dishes.create');
    Route::get('/{id}', [DishController::class, 'show'])->name('admin.dishes.show');
    Route::post('/create', [DishController::class, 'store'])->name('admin.dishes.store');
    Route::delete('/{id}', [DishController::class, 'delete'])->name('admin.dishes.delete');
    Route::get('/edit/{id}', [DishController::class, 'edit'])->name('admin.dishes.edit');
    Route::put('/{id}', [DishController::class, 'update'])->name('admin.dishes.update');
    Route::post('/images', [DishController::class, 'uploadImages'])->name('admin.dishes.upload');
});