<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\SubjectController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/dashboard/enrollment', function () {
    return view('layouts.enrollment');
})->middleware(['auth', 'verified', 'role:student'])->name('enrollment');


Route::get('/student/dashboard/classlist', [ApproveController::class, 'getClasslist']) 
->middleware(['auth', 'verified', 'role:admin'])->name('classlist');




Route::get('/student/dashboard/profile', [EnrollmentController::class, 'profile'])->name('profile');




Route::get('/student/dashboard', function () {
    return view('studentpage.student');
})->middleware(['auth', 'role:student']);

Route::get('/admin/dashboard', function () {
    return view('adminpage.admin');
})->middleware(['auth', 'role:admin']);



Route::post('/enroll', [EnrollmentController::class, 'store'])->name('enroll.store');

Route::put('/profile/update/{user_id}', [EnrollmentController::class, 'update'])->name('enrollments.update');



Route::post('/assign-subjects', [SubjectController::class, 'assignSubjects'])->name('assign.subjects');




Route::get('/admin/dashboard/applicants', [EnrollmentController::class, 'index'])->name('applicants.index');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/enrollment/user/{user_id}', [EnrollmentController::class, 'getEnrollmentByUser']);


Route::post('/approve-student/{user_id}', [ApproveController::class, 'approveStudent'])->name('approve.student');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/enroll', [EnrollmentController::class, 'create'])->name('enrollments.create');
    Route::post('/enroll', [EnrollmentController::class, 'store'])->name('enrollments.store');
   
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
