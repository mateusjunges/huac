<?php

use HUAC\Http\Controllers\ACL\GroupsController;
use HUAC\Http\Controllers\ACL\UsersController;
use HUAC\Http\Controllers\Surgery\SurgeryController;
use HUAC\Http\Controllers\Room\RoomsController;
use HUAC\Http\Controllers\HomeController;
use HUAC\Http\Controllers\ACL\GroupsPermissionsController;

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
    Route::resource('groups', GroupsController::class);
    Route::resource('rooms', RoomsController::class);
    Route::get('groups/{group}/permissions', [GroupsPermissionsController::class, 'index'])->name('groups.permissions');
});
