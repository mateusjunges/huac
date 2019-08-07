<?php

use HUAC\Http\Controllers\Api\ACL\Groups\GroupsUsersController;
use HUAC\Http\Controllers\Api\ACL\Groups\GroupsController;
use HUAC\Http\Controllers\Api\ACL\Groups\GroupsPermissionsController;
use HUAC\Http\Controllers\Api\ACL\Permissions\PermissionsController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersDataController;
use HUAC\Http\Controllers\Api\ACL\Users\UsersPermissionsController;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Api\ACL\Users\UsersColumnsController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function () {
    Route::get('users', UsersController::class);
    Route::get('users/data', UsersDataController::class)->name('api.users.data');
    Route::get('users/columns', UsersColumnsController::class)->name('api.users.columns');
    Route::delete('users/{user}/permissions', [UsersPermissionsController::class, 'revoke'])->name('api.users.permissions.revoke');
    Route::get('groups', [GroupsController::class, 'all'])->name('api.groups.all');
    Route::post('groups/{group}/assign-permissions', [GroupsPermissionsController::class, 'attach']);
    Route::post('groups/{group}/attach-users', [GroupsUsersController::class, 'attach'])->name('api.groups.users.attach');
    Route::delete('groups/permissions', [GroupsPermissionsController::class, 'revoke'])->name('api.delete.groups.permissions');
    Route::delete('groups/users', [GroupsUsersController::class, 'remove'])->name('groups.users.remove');
    Route::delete('groups/{group}', [GroupsController::class, 'destroy'])->name('api.groups.delete');

    Route::get('permissions', PermissionsController::class);
});
