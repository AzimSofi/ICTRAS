<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');

Route::resource('endorsed_courses', App\Http\Controllers\EndorsedCourseController::class);
Route::get('student_management', [App\Http\Controllers\StudentManagementController::class, 'index'])->name('student_management.index');
Route::get('userlogs', [App\Http\Controllers\UserlogController::class, 'index'])->name('userlogs.index');

Route::post('previous_institution', [App\Http\Controllers\StudentController::class, 'createPreviousInstitution'])->name('student.createPreviousInstitution');
Route::resource('applications', App\Http\Controllers\ApplicationController::class);
