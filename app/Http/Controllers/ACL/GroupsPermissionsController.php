<?php

namespace HUAC\Http\Controllers\ACL;

use Illuminate\Http\Request;
use Junges\ACL\Http\Models\Group;

class GroupsPermissionsController
{
    /**
     * Return the view with all group permissions.
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Group $group)
    {
        $permissions = $group->permissions()->get();

        return view('ACL.groups.permissions.group-permissions')->with([
            'permissions' => $permissions,
            'group'       => $group
        ]);
    }
}
