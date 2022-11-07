<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\ScheduleController;

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

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {

    return view('auth.login');
})->middleware('guest');



Route::group(["middleware" => "admin", "prefix" => "admin"], function () {
    // Users Resource
    Route::resource('users', App\Http\Controllers\AccountController::class);
    // Fetch Users
    Route::get('fetch', [App\Http\Controllers\AccountController::class, 'fetchUsers'])->name('fetch');
    // Admin Resource
    Route::resource('admin', App\Http\Controllers\AdminController::class);
  
});


Route::group(["middleware" => "user", "prefix" => "user"], function () {

    // User Resource
    Route::resource('user', App\Http\Controllers\UserController::class);
    // Event Resource
    Route::resource('event', App\Http\Controllers\EventController::class);

    // fetch event
    Route::get('/fetch-sched/event', [App\Http\Controllers\EventController::class,'fetchEvent'])->name('fetchevent');
    // Check Schedule
    Route::post('/check/event', [App\Http\Controllers\EventController::class,'checkSchedule'])->name('checkschedule');

    // Get City 
    Route::post('/get-cities', [App\Http\Controllers\EventController::class, 'getCities'])->name('getcities');
    // Get Barangay 
    Route::post('/get-brgy', [App\Http\Controllers\EventController::class, 'getBrgy'])->name('getbrgy');

    // Reset City 
    Route::post('/reset-cities', [App\Http\Controllers\EventController::class, 'resetCity'])->name('resetcity');
    // Reset Barangay 
    Route::post('/reset-brgy', [App\Http\Controllers\EventController::class, 'resetBrgy'])->name('resetbarangay');

    

    // User Schedule
    Route::resource('schedule', App\Http\Controllers\ScheduleController::class);
    Route::post('/sched', [ScheduleController::class, 'store'])->name('save_schedule');
    Route::post('/schedule', [ScheduleController::class, 'DateSelect'])->name('user.dateselect');
    Route::get('/fetch-sched', [ScheduleController::class, 'fetchSched'])->name('fetch_schedule');
    Route::delete('/sched_destroy/{s_id}', [ScheduleController::class, 'schedDestroy'])->name('destroy_schedule');
    Route::get('/sched_edit/{s_id}', [ScheduleController::class, 'schedEdit'])->name('edit_schedule');
    Route::put('/sched_update/{s_id}', [ScheduleController::class, 'schedUpdate'])->name('update_schedule');





});


Auth::routes();


