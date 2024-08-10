<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMaterialController;

Route::get('login', [AuthController::class, 'showLoginPage'])->name('login.show');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegisterPage'])->name('register.show');
Route::get('register', [AuthController::class, 'register'])->name('register');

Route::resource('admin/courses', CourseController::class);
Route::resource('admin/materials', CourseMaterialController::class);
Route::resource('admin/users', UserController::class);
