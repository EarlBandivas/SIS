<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/dashboard/enrollment', function () {
    return view('layouts.enrollment');
})->middleware(['auth', 'verified', 'role:student'])->name('enrollment');

// Route::get('/login', function () {
//     return view('login');
// })->middleware(['auth', 'verified'])->name('login');

Route::get('/student/dashboard', function () {
    return view('studentpage.student');
})->middleware(['auth', 'role:student']);

Route::get('/admin/dashboard', function () {
    return view('adminpage.admin');
})->middleware(['auth', 'role:admin']);

// Route::get('/admin/dashboard/viewapplicants', function () {
//     return view('layouts.applicants');
// })->middleware(['auth', 'verified', 'role:admin'])->name('applicants');

Route::post('/enroll', [EnrollmentController::class, 'store'])->name('enroll.store');

// Route::get('/admin/enrollments', [EnrollmentController::class, 'index'])->name('enrollments');

Route::get('/admin/dashboard/viewapplicants/applicants', [EnrollmentController::class, 'index'])->name('applicants.index');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
