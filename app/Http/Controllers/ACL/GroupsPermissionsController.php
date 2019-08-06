<?php

namespace HUAC\Http\Controllers\ACL;

use Illuminate\Http\Request;
use Junges\ACL\Http\Models\Group;
use Junges\ACL\Http\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

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

    public function revoke(Request $request)
    {
        $group = Group::find($request->input('group_id'));

        $group->revokePermissions($request->input('permissions'));

        return response()->json([
            'code'  => Response::HTTP_OK,
            'text'  => trans('huac.permission_revoked_successfully'),
            'title' => trans('')
        ]);
    }
}
