<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserApplicationController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/
Route::view('/', 'frontend.home')->name('home');
Route::get('/jobs', [FrontendController::class, 'jobs'])->name('jobs');
Route::view('/contact', 'frontend.contact')->name('contact');
Route::get('/jobs', [FrontendController::class, 'jobs'])->name('jobs');
Route::get('/about', function () {
    return view('frontend.about'); // ya jo tumhari file hai
})->name('about');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


/*
|--------------------------------------------------------------------------
| USER (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Apply Job
    Route::get('/apply/{job_id}', [UserApplicationController::class, 'create'])->name('apply.form');
    Route::post('/apply', [UserApplicationController::class, 'store'])->name('apply.store');

    // My Applications
    Route::get('/applications', [UserApplicationController::class, 'index'])->name('my.applications');
});


/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN JOBS
|--------------------------------------------------------------------------
*/
Route::get('/admin/jobs', [JobController::class, 'index'])->name('admin.jobs');
Route::post('/admin/jobs/store', [JobController::class, 'store'])->name('admin.jobs.store');
Route::get('/admin/jobs/list', [JobController::class, 'list'])->name('admin.jobs.list');
Route::get('/admin/jobs/edit/{id}', [JobController::class, 'edit'])->name('admin.jobs.edit');
Route::put('/admin/jobs/update/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
Route::get('/admin/jobs/delete/{id}', [JobController::class, 'delete'])->name('admin.jobs.delete');


/*
|--------------------------------------------------------------------------
| ADMIN APPLICATIONS
|--------------------------------------------------------------------------
*/
Route::get('/admin/applications', [ApplicationController::class, 'list'])->name('admin.applications');

Route::post('/admin/application/approve/{id}', [ApplicationController::class, 'approve'])->name('application.approve');
Route::post('/admin/application/reject/{id}', [ApplicationController::class, 'reject'])->name('application.reject');

Route::prefix('admin')->name('admin.')->group(function () {

    // Students
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

    Route::get('/students/list', [StudentController::class, 'list'])->name('students.list');

    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');

    Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');

    Route::get('/students/delete/{id}', [StudentController::class, 'delete'])->name('students.delete');
});
Route::prefix('admin')->name('admin.')->group(function () {

    // Add form
    Route::get('/companies', [CompanyController::class, 'index'])
        ->name('company');

    // Store
    Route::post('/companies/store', [CompanyController::class, 'store'])
        ->name('company.store');

    // List
    Route::get('/companies/list', [CompanyController::class, 'list'])
        ->name('company.list');

    // ✅ EDIT (MISSING THA)
    Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])
        ->name('company.edit');

    // ✅ UPDATE
    Route::put('/companies/update/{id}', [CompanyController::class, 'update'])
        ->name('company.update');

    // ✅ DELETE
    Route::get('/companies/delete/{id}', [CompanyController::class, 'delete'])
        ->name('company.delete');
});
// USER
Route::get('/applications', [UserApplicationController::class, 'index'])->name('my.applications');

