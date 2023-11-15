<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserlogController;

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
Route::resource('admin', App\Http\Controllers\AdminController::class);
Route::resource('endorsed_courses', App\Http\Controllers\EndorsedCourseController::class); // ->shallow();
Route::resource('user_assignments', App\Http\Controllers\UserAssignmentController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('userlogs', [UserlogController::class, 'index'])->name('userlogs.index');

