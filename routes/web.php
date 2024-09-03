<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobController::class);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

/* Other ways of defining Routes */

//Route::get('/', function () {
//    return view('home');
//});

//Route::get('/jobs', [JobController::class, 'index']);

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
