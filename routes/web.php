<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubAdminController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/admin/users/{user}/role', [AdminController::class, 'setRole'])->name('admin.setRole');
        Route::post('/admin/users/{user}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    });

    Route::middleware('role:subadmin')->group(function () {
        Route::get('/subadmin/dashboard', [SubAdminController::class, 'dashboard'])->name('subadmin.dashboard');
        Route::post('/subadmin/users/{user}/role', [SubAdminController::class, 'setRole'])->name('subadmin.setRole');
        Route::post('/subadmin/users/{user}/delete', [SubAdminController::class, 'deleteUser'])->name('subadmin.users.delete');
    });

    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});