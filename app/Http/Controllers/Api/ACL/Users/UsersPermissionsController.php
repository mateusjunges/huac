<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;

use HUAC\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        if (Gate::denies('users.revoke-permission')) {
            return response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'icon' => 'warning',
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'timer' => 5000,
            ]);
        }

        $user = $user->revokePermissions($request->input('permission'));

        return response()->json([
            'code'  => Response::HTTP_OK,
            'title' => trans('huac.success'),
            'text'  => trans('huac.permission_revoked_successfully'),
            'timer' => 5000,
            'icon'  => 'success',
        ], Response::HTTP_OK);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function attach(User $user, Request $request)
    {
        if (Gate::denies('users.assign-permissions')) {
            return response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'icon' => 'warning',
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'timer' => 5000,
            ]);
        }

        $user = $user->assignPermissions($request->input('permissions'));

        return response()->json([
            'code'  => Response::HTTP_OK,
            'title' => trans('huac.success'),
            'text'  => trans('huac.permissions_successfully_attached'),
            'timer' => 5000,
            'icon'  => 'success',
        ], Response::HTTP_OK);
    }
}
