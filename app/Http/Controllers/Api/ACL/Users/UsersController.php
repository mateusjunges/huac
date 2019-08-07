<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;


use HUAC\Http\Resources\UsersResource;
use HUAC\Models\User;

class UsersController
{
    public function __invoke()
    {
        return UsersResource::collection(
            User::all()
        );
    }
}
