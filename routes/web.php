<?php

use HUAC\Http\Controllers\Surgery\SurgeryController;
use HUAC\Http\Controllers\HomeController;

Route::group(['namespace' => 'HUAC\Http\Controllers'], function () {
    Auth::routes();
});

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function (){
   Route::resource('surgeries', SurgeryController::class);
});

Route::get('home', [HomeController::class, 'index'])->name('home');
