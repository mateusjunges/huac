<?php

use HUAC\Http\Controllers\Api\ACL\Groups\GroupsUsersController;
use HUAC\Http\Controllers\Api\ACL\Groups\GroupsController;
use HUAC\Http\Controllers\Api\ACL\Groups\GroupsPermissionsController;
use HUAC\Http\Controllers\Api\ACL\Permissions\PermissionsController;
use HUAC\Http\Controllers\Api\ACL\Users\UserGroupsController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersDataController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersPermissionsController;
use HUAC\Http\Controllers\Api\CME\CMESurgeriesColumnsController;
use HUAC\Http\Controllers\Api\CME\CMESurgeriesDataController;
use HUAC\Http\Controllers\Api\CME\ConfirmMaterialsCMEController;
use HUAC\Http\Controllers\Api\CME\DenyMaterialsCMEController;
use HUAC\Http\Controllers\Api\Events\ChangeRoomController;
use HUAC\Http\Controllers\Api\Events\EventController;
use HUAC\Http\Controllers\Api\Events\EventDateController;
use HUAC\Http\Controllers\Api\Events\EventDetailsController;
use HUAC\Http\Controllers\Api\Events\EventHistoryController;
use HUAC\Http\Controllers\Api\Events\GetEventsPerRoomController;
use HUAC\Http\Controllers\Api\Patients\PatientsColumnsController;
use HUAC\Http\Controllers\Api\Patients\PatientsController;
use HUAC\Http\Controllers\Api\Patients\PatientsDataController;
use HUAC\Http\Controllers\Api\Patients\Surgeries\DeletePatientSurgeryController;
use HUAC\Http\Controllers\Api\Patients\Surgeries\PatientSurgeriesColumnsController;
use HUAC\Http\Controllers\Api\Patients\Surgeries\PatientSurgeriesDataController;
use HUAC\Http\Controllers\Api\Scheduling\VerifyExistingSchedulesBeforeCreateController;
use HUAC\Http\Controllers\Api\Scheduling\VerifyExistingSchedulesBeforeUpdateController;
use HUAC\Http\Controllers\Api\Scheduling\VerifyReservedPeriodController;
use HUAC\Http\Controllers\Api\Status\StatusController;
use HUAC\Http\Controllers\Api\Surgeons\VerifySurgeonAvailabilityController;
use HUAC\Http\Controllers\Api\Surgeries\SurgeriesColumnsController;
use HUAC\Http\Controllers\Api\Surgeries\SurgeriesController;
use HUAC\Http\Controllers\Api\Surgeries\SurgeriesDataController;
use HUAC\Http\Controllers\Api\Surgeries\SurgeryStatusController;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Api\ACL\Users\UsersColumnsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('s/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function () {
    /**
     * User routes
     */
    Route::prefix('users')->group(function() {
        Route::get('/', [UsersController::class, 'index']);
        Route::get('data', UsersDataController::class)->name('api.users.data');
        Route::get('columns', UsersColumnsController::class)->name('api.users.columns');
        Route::prefix('{user}')->group(function() {
            Route::delete('/', [UsersController::class, 'destroy'])->name('api.users.delete');
            Route::delete('permissions', [UsersPermissionsController::class, 'revoke'])->name('api.users.permissions.revoke');
            Route::post('assign-permissions', [UsersPermissionsController::class, 'attach'])->name('api.users.permissions.assign');
            Route::post('assign-groups', [UserGroupsController::class, 'attach'])->name('api.users.groups.attach-groups');
            Route::delete('remove-group', [UserGroupsController::class, 'revoke'])->name('api.users.groups.remove-group');
        });
    });

    /**
     * Group routes
     */
    Route::prefix('groups')->group(function() {
        Route::get('/', [GroupsController::class, 'all'])->name('api.groups.all');
        Route::prefix('{group}')->group(function() {
            Route::delete('/', [GroupsController::class, 'destroy'])->name('api.groups.delete');
            Route::post('assign-permissions', [GroupsPermissionsController::class, 'attach']);
            Route::post('attach-users', [GroupsUsersController::class, 'attach'])->name('api.groups.users.attach');
        });
        Route::delete('permissions', [GroupsPermissionsController::class, 'revoke'])->name('api.delete.groups.permissions');
        Route::delete('users', [GroupsUsersController::class, 'remove'])->name('groups.users.remove');
    });

    /**
     * Permission routes
     */
    Route::get('permissions', PermissionsController::class);

    /**
     * Surgery routes
     */
    Route::prefix('surgeries')->group(function() {
        Route::get('data', SurgeriesDataController::class);
        Route::get('columns', SurgeriesColumnsController::class);
        Route::prefix('{surgery}')->group(function() {
            Route::delete('/', [SurgeriesController::class, 'destroy'])->name('api.surgeries.delete');
        });
        Route::prefix('status')->group(function() {
            Route::put('update', [SurgeryStatusController::class, 'update']);
        });
        Route::prefix('confirm-materials')->group(function() {
           Route::prefix('cme')->group(function() {
               Route::get('columns', CMESurgeriesColumnsController::class);
               Route::get('data', CMESurgeriesDataController::class);
               Route::prefix('{surgery}')->group(function() {
                   Route::post('confirm', ConfirmMaterialsCMEController::class);
                   Route::post('deny', DenyMaterialsCMEController::class);
               });
           });
        });
    });

    /**
     * FullCalendar Routes
     */
    Route::prefix('events')->group(function() {
        Route::post('/', [EventController::class, 'store'])->name('api.events.store');
        Route::prefix('{event}')->group(function() {
            Route::put('/', [EventController::class, 'update'])->name('api.events.update');
            Route::delete('/', [EventController::class, 'destroy'])->name('api.events.destroy');
            Route::get('details', EventDetailsController::class);
            Route::put('change-room', ChangeRoomController::class);
            Route::put('change-date', [EventDateController::class, 'update']);
            Route::get('history', EventHistoryController::class);
        });
        Route::get('{room}', GetEventsPerRoomController::class)->name('api.events.per-room');
    });

    Route::prefix('scheduling')->group(function () {
       Route::get('verify-reserved-period-before-store', [VerifyReservedPeriodController::class, 'beforeStore']);
       Route::get('verify-reserved-period-before-update', [VerifyReservedPeriodController::class, 'beforeUpdate']);
       Route::get('verify-existing-schedules-before-update', VerifyExistingSchedulesBeforeUpdateController::class);
       Route::get('verify-existing-schedules-before-create', VerifyExistingSchedulesBeforeCreateController::class);
    });

    Route::prefix('surgeons')->group(function() {
       Route::get('availability', VerifySurgeonAvailabilityController::class);
    });

    Route::get('status', [StatusController::class, 'index']);

    Route::prefix('patients')->group(function() {
        Route::get('columns', PatientsColumnsController::class);
        Route::get('data', PatientsDataController::class);
        Route::prefix('{patient}')->group(function() {
            Route::delete('/', [PatientsController::class, 'destroy']);
            Route::prefix('surgeries')->group(function() {
                Route::get('columns', PatientSurgeriesColumnsController::class);
                Route::get('data', PatientSurgeriesDataController::class);
            });
        });
        Route::prefix('surgeries')->group(function() {
            Route::delete('{surgery}', DeletePatientSurgeryController::class);
        });
    });
});
