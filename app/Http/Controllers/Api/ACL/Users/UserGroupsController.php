<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;

use HUAC\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserGroupsController
{
    /**
     * Attach groups to the specified user.
     *
     * @param User $user
     * @param Request $request
     * @return JsonResponse
     */
    public function attach(User $user, Request $request)
    {
        if (Gate::denies('users.attach-group')) {
            return response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'icon' => 'warning',
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'timer' => 5000,
            ]);
        }
        $user = $user->assignGroup($request->input('groups'));

        return response()->json([
            'code'  => Response::HTTP_OK,
            'title' => trans('huac.success'),
            'text'  => trans('huac.groups_successfully_attached'),
            'timer' => 5000,
            'icon'  => 'success'
        ], Response::HTTP_OK);
    }

    /**
     * Revoke group from the specified user.
     *
     * @param User $user
     * @param Request $request
     * @return JsonResponse
     */
    public function revoke(User $user, Request $request)
    {
        if (Gate::denies('users.revoke-group')) {
            return response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'icon' => 'warning',
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'timer' => 5000,
            ]);
        }

        $user->revokeGroup($request->input('groups'));

        return response()->json([
            'code'  => Response::HTTP_OK,
            'title' => trans('huac.success'),
            'text'  => trans('huac.group_removed_successfully'),
            'timer' => 5000,
            'icon'  => 'success'
        ], Response::HTTP_OK);
    }
}
