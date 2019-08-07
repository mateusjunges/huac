<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;

use HUAC\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersPermissionsController
{
    /**
     * Revoke a permission from the specified user.
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revoke(User $user, Request $request)
    {
        $user = $user->revokePermissions($request->input('permission'));

        return response()->json([
            'code'  => Response::HTTP_OK,
            'title' => trans('huac.success'),
            'text'  => trans('huac.permission_revoked_successfully'),
            'timer' => 5000,
            'icon'  => 'success',
        ], Response::HTTP_OK);
    }
}
