<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;

use HUAC\Models\User;
use Illuminate\Http\Request;

class ValidateUsernameController
{
    public function __invoke(Request $request)
    {
        return User::where('username', $request->input('username'))->count();
    }
}
