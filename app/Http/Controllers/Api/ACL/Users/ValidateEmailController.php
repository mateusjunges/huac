<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;

use HUAC\Models\User;
use Illuminate\Http\Request;

class ValidateEmailController
{
    public function __invoke(Request $request)
    {
        return User::where('email', $request->input('email'))->get()->count();
    }
}
