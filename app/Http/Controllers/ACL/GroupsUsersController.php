<?php

namespace HUAC\Http\Controllers\ACL;

use Junges\ACL\Http\Models\Group;

class GroupsUsersController
{
    /**
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users(Group $group)
    {
        $users = $group->users()->get();
        return view('ACL.groups.users.index')->with([
            'users' => $users,
            'group' => $group
        ]);
    }

}
