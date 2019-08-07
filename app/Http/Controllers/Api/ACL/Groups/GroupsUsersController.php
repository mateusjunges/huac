<?php

namespace HUAC\Http\Controllers\Api\ACL\Groups;

use Illuminate\Http\Request;
use Junges\ACL\Http\Models\Group;
use Symfony\Component\HttpFoundation\Response;

class GroupsUsersController
{
    /**
     * Remove a user from the specified group.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(Request $request)
    {
        $user = $request->input('user');
        $group = Group::find($request->input('group'));

        $group->removeUser($user);

        return response()->json([
           'code'  => Response::HTTP_OK,
           'icon'  => 'success',
           'title' => trans('huac.success'),
           'text'  => trans('huac.user_removed_successfully'),
           'timer' => 5000
        ]);
    }

    /**
     * Attach users to a specified group.
     * @param Request $request
     * @param Group $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function attach(Request $request, Group $group)
    {
        $group = $group->assignPermissions($request->input('permissions'));

        return response()->json([
            'code'  => Response::HTTP_OK,
            'icon'  => 'success',
            'title' => trans('huac.success'),
            'text'  => trans('huac.users_successfully_attached'),
            'timer' => 5000
        ], Response::HTTP_OK);
    }
}
