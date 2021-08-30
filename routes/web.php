<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerRegisterController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [JobController::class, 'index'])->name('home.index');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// JOB ROUTE LIST
Route::prefix('jobs')->group(function () {
    Route::get('/{id}/{job}', [JobController::class, 'show'])->name('jobs.show');
    Route::get('/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/store', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/myjob/edit/{id}', [JobController::class, 'editjob'])->name('jobs.edit');
    Route::get('/my-job', [JobController::class, 'myjob'])->name('jobs.myjob');
    Route::post('/update/{id}', [JobController::class, 'update'])->name('jobs.update');

    Route::get('/applications', [JobController::class, 'applicant'])->name('jobs.applicant');
});

// Job Application
Route::post('application/{id}', [JobController::class, 'apply'])->name('jobs.apply');

// USER PROFILE ROUTE LIST
Route::prefix('user')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/create', [UserProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile/coverletter', [UserProfileController::class, 'coverletter'])->name('profile.cover.letter');
    Route::post('/profile/resume', [UserProfileController::class, 'resume'])->name('profile.resume');
    Route::post('/profile/avater', [UserProfileController::class, 'avater'])->name('profile.avater');
});

// EMPLOYER ROUTE LIST
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('/employer/register', [EmployerRegisterController::class, 'employerRegister'])->name('emp.register');

// COMPANY ROUTE LIST
Route::prefix('company')->group(function () {
    Route::get('/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
    Route::post('/cover/photo', [CompanyController::class, 'coverPhoto'])->name('company.cover.photo');
    Route::post('/logo', [CompanyController::class, 'logo'])->name('company.logo');
});
