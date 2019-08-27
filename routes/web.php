<?php

use HUAC\Http\Controllers\ACL\GroupsUsersController;
use HUAC\Http\Controllers\ACL\GroupsController;
use HUAC\Http\Controllers\ACL\UserGroupsController;
use HUAC\Http\Controllers\ACL\UserPermissionsController;
use HUAC\Http\Controllers\ACL\UsersController;
use HUAC\Http\Controllers\SurgicalRoom\SurgicalRoomController;
use HUAC\Http\Controllers\Scheduling\SchedulingController;
use HUAC\Http\Controllers\Surgeries\SurgeryController;
use HUAC\Http\Controllers\HomeController;
use HUAC\Http\Controllers\ACL\GroupsPermissionsController;
use HUAC\Http\Controllers\WaitingList\WaitingListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    Route::get('users/{user}/permissions', [UserPermissionsController::class, 'index'])->name('users.permissions');
    Route::get('users/{user}/groups', [UserGroupsController::class, 'index'])->name('users.groups');
    Route::resource('users', UsersController::class);
    Route::resource('groups', GroupsController::class);
    Route::resource('rooms', SurgicalRoomController::class);

    Route::get('groups/{group}/users', [GroupsUsersController::class, 'users'])->name('groups.users');
    Route::resource('groups', GroupsController::class)->except([
        'destroy'
    ]);
    Route::get('groups/{group}/permissions', [GroupsPermissionsController::class, 'index'])->name('groups.permissions');

    Route::resource('waiting-list', WaitingListController::class);

    Route::get('scheduling', SchedulingController::class)->name('surgeries.scheduling');
});
