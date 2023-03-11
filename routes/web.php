<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\Backend\UserController::class, 'index'])->name('user');
Route::get('/user/create', [App\Http\Controllers\Backend\UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\Backend\UserController::class, 'store'])->name('user.store');
Route::get('/user/profile', [App\Http\Controllers\Backend\UserController::class, 'profile'])->name('user.profile');
Route::get('/user/edit/{id}', [App\Http\Controllers\Backend\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [App\Http\Controllers\Backend\UserController::class, 'update'])->name('user.update');
Route::delete('/user/destroy/{id}', [App\Http\Controllers\Backend\UserController::class, 'destroy'])->name('user.destroy');

// Job post
Route::get('/job', [App\Http\Controllers\Backend\JobController::class, 'index'])->name('job');
Route::get('/my-job', [App\Http\Controllers\Backend\JobController::class, 'myJob'])->name('job.myjob');
Route::get('/job/create', [App\Http\Controllers\Backend\JobController::class, 'create'])->name('job.create');
Route::post('/job/store', [App\Http\Controllers\Backend\JobController::class, 'store'])->name('job.store');
Route::get('/job/edit/{id}', [App\Http\Controllers\Backend\JobController::class, 'edit'])->name('job.edit');
Route::post('/job/update/{id}', [App\Http\Controllers\Backend\JobController::class, 'update'])->name('job.update');
Route::delete('/job/destroy/{id}', [App\Http\Controllers\Backend\JobController::class, 'destroy'])->name('job.destroy');

// Fontend Job
Route::get('/all-job', [App\Http\Controllers\Frontend\JobController::class, 'index'])->name('frontend.job');
Route::get('/job/details/{id}', [App\Http\Controllers\Frontend\JobController::class, 'jobDetails'])->name('job.details');
Route::get('/job/apply/{id}', [App\Http\Controllers\Frontend\ApplyController::class, 'jobApply'])->name('job.apply');
Route::post('/job/post', [App\Http\Controllers\Frontend\ApplyController::class, 'jobPost'])->name('job.post');
