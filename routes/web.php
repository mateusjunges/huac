<?php

use HUAC\Http\Controllers\ACL\UsersController;
use HUAC\Http\Controllers\Surgery\SurgeryController;
use HUAC\Http\Controllers\HomeController;

Route::group(['namespace' => 'HUAC\Http\Controllers'], function () {
    Auth::routes();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'index'])->name('home');

/* Routes that needs authentication */
Route::group(['middleware' => 'auth'], function (){
    Route::resource('surgeries', SurgeryController::class);
    Route::resource('users', UsersController::class);
});
