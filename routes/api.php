<?php

use HUAC\Http\Controllers\Api\ACL\Users\UsersDataController;
use HUAC\Http\Controllers\Api\ACL\Users\ValidateEmailController;
use HUAC\Http\Controllers\Api\ACL\Users\ValidateUsernameController;
use HUAC\Http\Controllers\Api\SurgeryClassifications\SurgeryClassificationsController;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Api\Procedures\ProceduresController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersColumnsController;
use HUAC\Http\Controllers\Api\Anesthetics\AnestheticsController;
use HUAC\Http\Controllers\Api\Surgeons\SurgeonsController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function () {
    Route::prefix('validation')->group(function () {
        Route::get('username', ValidateUsernameController::class)->name('api.validation.username');
        Route::get('email', ValidateEmailController::class)->name('api.validation.email');
    });

    Route::get('procedures', [ProceduresController::class, 'all'])->name('api.procedures.index');
    Route::get('procedures/{procedure}', [ProceduresController::class, 'find'])->name('api.procedures.find');

    Route::get('anesthetics', [AnestheticsController::class, 'all'])->name('api.anesthetics.all');
    Route::get('anesthetics/{anesthesia}', [AnestheticsController::class, 'find'])->name('api.anesthetics.find');

    Route::get('surgeons', [SurgeonsController::class, 'all'])->name('api.surgeons.all');
    Route::get('surgeons/{surgeon}', [SurgeonsController::class, 'find'])->name('api.surgeons.find');

    Route::get('classifications', [SurgeryClassificationsController::class, 'all'])
        ->name('api.surgery-classifications.all');
    Route::get('classifications/{classification}', [SurgeryClassificationsController::class, 'find'])
        ->name('api.surgery-classifications.find');

    Route::get('users', UsersDataController::class)->name('api.users.data');
    Route::get('users/columns', UsersColumnsController::class)->name('api.users.columns');
});
