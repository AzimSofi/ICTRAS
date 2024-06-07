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

// Admin
Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('admin/students_application', [App\Http\Controllers\AdminController::class, 'studentApplication'])->name('admin.student-application.index');
// Route::post('/admin/student-application/{application}/approve', [App\Http\Controllers\AdminController::class, 'applicationApprove'])->name('admin.student-application.approve');
// Route::post('/admin/student-application/{application}/disapprove', [App\Http\Controllers\AdminController::class, 'applicationDisapprove'])->name('admin.student-application.disapprove');
Route::post('/admin/student-application/{application}/update', [App\Http\Controllers\AdminController::class, 'applicationUpdate'])->name('admin.student-application.update');
Route::get('student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
Route::get('lecturer', [App\Http\Controllers\LecturerController::class, 'index'])->name('lecturer.index');
Route::get('hod', [App\Http\Controllers\HodController::class, 'index'])->name('hod.index');


// Student
Route::resource('endorsed_courses', App\Http\Controllers\EndorsedCourseController::class);
Route::get('student_management', [App\Http\Controllers\StudentManagementController::class, 'index'])->name('student_management.index');
Route::get('student_management/print', [App\Http\Controllers\StudentManagementController::class, 'print'])->name('student_management.print');
Route::get('userlogs', [App\Http\Controllers\UserlogController::class, 'index'])->name('userlogs.index');

Route::post('previous_institution/create', [App\Http\Controllers\StudentController::class, 'createPreviousInstitution'])->name('student.createPreviousInstitution');
Route::post('previous_institution/edit', [App\Http\Controllers\StudentController::class, 'editPreviousInstitution'])->name('student.editPreviousInstitution');
Route::get('print_form/{user}', [App\Http\Controllers\StudentController::class, 'print'])->name('student.print.fromAdmin');
Route::get('print_form', [App\Http\Controllers\StudentController::class, 'print'])->name('student.print');
Route::resource('applications', App\Http\Controllers\ApplicationController::class);

// HOD
Route::get('hod/students_application', [App\Http\Controllers\HodController::class, 'studentApplication'])->name('hod.student-application.index');
Route::post('/hod/student-application/{application}/approve', [App\Http\Controllers\HodController::class, 'applicationApprove'])->name('hod.student-application.approve');
Route::post('/hod/student-application/{application}/disapprove', [App\Http\Controllers\HodController::class, 'applicationDisapprove'])->name('hod.student-application.disapprove');
Route::post('/hod/student-application/{application}/recommend-to-lecturer', [App\Http\Controllers\HodController::class, 'recommendToLecturer'])->name('hod.student-application.recommend-to-lecturer');


// Lecturer
Route::get('lecturer/dashboard', [App\Http\Controllers\LecturerController::class, 'dashboard'])->name('lecturer.dashboard');
Route::post('/hod/student-application/{application}/recommend', [App\Http\Controllers\LecturerController::class, 'applicationRecommend'])->name('lecturer.student-application.recommend');
Route::post('/hod/student-application/{application}/not-recommend', [App\Http\Controllers\LecturerController::class, 'applicationNotRecommend'])->name('lecturer.student-application.not-recommend');

// Storing pdf
Route::get('/previous-study-plans/upload', [App\Http\Controllers\StudentController::class, 'showUploadForm'])->name('previousStudyPlan.upload');
Route::post('/previous-study-plans/upload', [App\Http\Controllers\StudentController::class, 'storePreviousStudyPlan'])->name('previousStudyPlan.store');
Route::get('/previous-study-plans/{previousStudyPlan}', [App\Http\Controllers\StudentController::class, 'showPreviousStudyPlan'])->name('previousStudyPlan.show');

Route::get('/applications/course-outline/index', [App\Http\Controllers\ApplicationController::class, 'indexCourseOutline'])->name('courseOutline.index');
Route::post('/applications/course-outline/upload/{application}', [App\Http\Controllers\ApplicationController::class, 'storeCourseOutline'])->name('courseOutline.store');
Route::get('/applications/course-outline/{application}', [App\Http\Controllers\ApplicationController::class, 'showCourseOutline'])->name('courseOutline.show');
