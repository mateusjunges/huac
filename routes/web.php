<?php

use HUAC\Http\Controllers\ACL\GroupsUsersController;
use HUAC\Http\Controllers\ACL\GroupsController;
use HUAC\Http\Controllers\ACL\UserGroupsController;
use HUAC\Http\Controllers\ACL\UserPermissionsController;
use HUAC\Http\Controllers\ACL\UsersController;
use HUAC\Http\Controllers\CME\ConfirmMaterialsController;
use HUAC\Http\Controllers\Patients\PatientController;
use HUAC\Http\Controllers\Patients\PatientSurgeryController;
use HUAC\Http\Controllers\Procedures\ProceduresController;
use HUAC\Http\Controllers\Schedule\ConfirmedMaterialsScheduleController;
use HUAC\Http\Controllers\Surgeries\MySurgeriesController;
use HUAC\Http\Controllers\Surgeries\OnGoing\OnGoingSurgeriesController;
use HUAC\Http\Controllers\SurgeryCenter\ConfirmMaterialsController as ConfirmSurgeryCenterMaterialsController;
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
    Route::resource('surgeries', SurgeryController::class, [
        'except' => ['show']
    ]);

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

    Route::resource('patients', PatientController::class)->except([
        'show'
    ]);
    Route::get('patients/{patient}/surgeries', PatientSurgeryController::class)->name('patients.surgeries');

    Route::prefix('surgeries')->group(function() {
        Route::prefix('cme')->group(function() {
            Route::get('materials-confirmation', ConfirmMaterialsController::class)
                ->name('confirm-materials.cme');
        });
        Route::prefix('surgery-center')->group(function () {
            Route::get('materials-confirmation', ConfirmSurgeryCenterMaterialsController::class)
                ->name('confirm-materials.surgery-center');
        });
        Route::prefix('manage')->group(function() {
           Route::prefix('{surgery}')->group(function() {
               Route::get('start', OnGoingSurgeriesController::class);
               Route::get('intercurrence', OnGoingSurgeriesController::class);
           });
        });
        Route::get('my', MySurgeriesController::class);
    });

    Route::prefix('schedule')->group(function () {
        Route::get('confirmed-material-events', ConfirmedMaterialsScheduleController::class)
            ->name('schedule.with-confirmed-materials');
    });

    Route::resource('procedures', ProceduresController::class);
});
