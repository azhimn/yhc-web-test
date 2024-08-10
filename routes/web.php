<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMaterialController;

Route::get('/', [AuthController::class, 'showLoginPage'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::resource('/courses', CourseController::class);
Route::resource('/materials', CourseMaterialController::class);
