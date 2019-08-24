<?php

use HUAC\Http\Controllers\Api\ACL\Groups\GroupsUsersController;
use HUAC\Http\Controllers\Api\ACL\Groups\GroupsController;
use HUAC\Http\Controllers\Api\ACL\Groups\GroupsPermissionsController;
use HUAC\Http\Controllers\Api\ACL\Permissions\PermissionsController;
use HUAC\Http\Controllers\Api\ACL\Users\UserGroupsController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersDataController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersPermissionsController;
use HUAC\Http\Controllers\Api\Events\EventController;
use HUAC\Http\Controllers\Api\Events\GetEventsPerRoomController;
use HUAC\Http\Controllers\Api\Scheduling\VerifyReservedPeriodController;
use HUAC\Http\Controllers\Api\Surgeons\VerifySurgeonAvailabilityController;
use HUAC\Http\Controllers\Api\Surgeries\SurgeriesColumnsController;
use HUAC\Http\Controllers\Api\Surgeries\SurgeriesController;
use HUAC\Http\Controllers\Api\Surgeries\SurgeriesDataController;

use Illuminate\Http\Request;
use HUAC\Http\Controllers\Api\ACL\Users\UsersColumnsController;

Route::middleware('auth:api')->get('s/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function () {
    Route::get('users', [UsersController::class, 'index']);
    Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('api.users.delete');
    Route::get('users/data', UsersDataController::class)->name('api.users.data');
    Route::get('users/columns', UsersColumnsController::class)->name('api.users.columns');
    Route::delete('users/{user}/permissions', [UsersPermissionsController::class, 'revoke'])->name('api.users.permissions.revoke');
    Route::post('users/{user}/assign-permissions', [UsersPermissionsController::class, 'attach'])->name('api.users.permissions.assign');
    Route::post('users/{user}/assign-groups', [UserGroupsController::class, 'attach'])->name('api.users.groups.attach-groups');
    Route::delete('users/{user}/remove-group', [UserGroupsController::class, 'revoke'])->name('api.users.groups.remove-group');

    Route::get('groups', [GroupsController::class, 'all'])->name('api.groups.all');
    Route::post('groups/{group}/assign-permissions', [GroupsPermissionsController::class, 'attach']);
    Route::post('groups/{group}/attach-users', [GroupsUsersController::class, 'attach'])->name('api.groups.users.attach');
    Route::delete('groups/permissions', [GroupsPermissionsController::class, 'revoke'])->name('api.delete.groups.permissions');
    Route::delete('groups/users', [GroupsUsersController::class, 'remove'])->name('groups.users.remove');
    Route::delete('groups/{group}', [GroupsController::class, 'destroy'])->name('api.groups.delete');

    Route::get('permissions', PermissionsController::class);

    Route::get('surgeries/data', SurgeriesDataController::class);
    Route::get('surgeries/columns', SurgeriesColumnsController::class);

    Route::delete('surgeries/{surgery}', [SurgeriesController::class, 'destroy'])->name('api.surgeries.delete');

    /**
     * FullCalendar Routes
     */
    Route::prefix('events')->group(function() {
        Route::put('{event}', [EventController::class, 'update']);
        Route::get('{room}', GetEventsPerRoomController::class)->name('api.events.per-room');
    });

    Route::prefix('scheduling')->group(function () {
       Route::get('verify-reserved-period-before-store', [VerifyReservedPeriodController::class, 'beforeStore']);
       Route::get('verify-reserved-period-before-update', [VerifyReservedPeriodController::class, 'beforeUpdate']);
    });

    Route::prefix('surgeons')->group(function() {
       Route::get('availability', VerifySurgeonAvailabilityController::class);
    });
});
