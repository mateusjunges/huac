<?php

namespace HUAC\Http\Controllers\Api\ACL\Groups;

use Illuminate\Http\Request;
use Junges\ACL\Http\Models\Group;
use Symfony\Component\HttpFoundation\Response;

class GroupsUsersController
{
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
}
