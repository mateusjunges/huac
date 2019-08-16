<?php

namespace HUAC\Http\Controllers\ACL;

use HUAC\Models\User;
use Illuminate\Http\Request;

class UserGroupsController
{
    public function index(User $user)
    {
        $groups = $user->groups()->get();

        return view('ACL.users.groups.user-groups')->with([
           'groups' => $groups,
           'user'   => $user,
        ]);
    }
}
