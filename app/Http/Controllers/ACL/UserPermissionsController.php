<?php

namespace HUAC\Http\Controllers\ACL;

use HUAC\Models\User;
use Illuminate\Http\Request;

class UserPermissionsController
{
    public function index(User $user)
    {
        $permissions = $user->permissions()->get();

        return view('ACL.users.permissions.user-permissions')->with([
            'permissions' => $permissions,
            'user'        => $user
        ]);
    }
}
