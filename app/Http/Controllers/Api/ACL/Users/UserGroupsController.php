<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;

use HUAC\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserGroupsController
{
    /**
     * Attach groups to the specified user.
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function attach(User $user, Request $request)
    {
        $user = $user->assignGroup($request->input('groups'));

        return response()->json([
            'code'  => Response::HTTP_OK,
            'title' => trans('huac.success'),
            'text'  => trans('huac.groups_successfully_attached'),
            'timer' => 5000,
            'icon'  => 'success'
        ], Response::HTTP_OK);
    }
}
