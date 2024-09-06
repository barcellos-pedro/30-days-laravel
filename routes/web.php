<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Jobs
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job'); // for Policy
//    ->can('edit-job', 'job'); // for Gate

Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'job'); // for Policy
//    ->can('edit-job', 'job'); // for Gate

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit', 'job'); // for Policy
//    ->can('edit-job', 'job'); // for Gate

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

/* Other ways of defining Routes */

//Route::get('/', function () {
//    return view('home');
//});

// Declare all routes based on convention
//Route::resource('jobs', JobController::class);

//Route::resource('jobs', JobController::class, [
//    'only' => ['index', 'store']
//]);

//Route::resource('jobs', JobController::class, [
//    'except' => ['edit', 'destroy']
//]);

//Route::controller(JobController::class)->group(function () {
//    Route::get('/jobs', 'index');
//    Route::get('/jobs/create', 'create');
//    Route::get('/jobs/{job}/edit', 'edit');
//    Route::get('/jobs/{job}', 'show');
//    Route::get('/jobs', 'store');
//    Route::patch('/jobs/{job}', 'update');
//    Route::delete('/jobs/{job}', 'destroy');
//});

//Route::delete('/jobs/{id}', function (int $id) {
//    Job::findOrFail($id)->delete();
//    return redirect('/jobs');
//});

//Route::delete('/jobs/{job}', function (Job job) {
//    dd($job);
//});
