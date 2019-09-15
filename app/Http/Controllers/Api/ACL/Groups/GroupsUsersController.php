<?php

namespace HUAC\Http\Controllers\Api\ACL\Groups;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Junges\ACL\Http\Models\Group;
use Symfony\Component\HttpFoundation\Response;

class GroupsUsersController
{
    /**
     * Remove a user from the specified group.
     * @param Request $request
     * @return JsonResponse
     */
    public function remove(Request $request)
    {
        if (Gate::denies('groups.remove-user')) {
            return response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'icon' => 'warning',
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'timer' => 5000,
            ]);
        }

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
     * @return JsonResponse
     */
    public function attach(Request $request, Group $group)
    {
        if (Gate::denies('groups.attach-user')) {
            return response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'icon' => 'warning',
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'timer' => 5000,
            ]);
        }

        $group = $group->assignUser($request->input('users'));

        return response()->json([
            'code'  => Response::HTTP_OK,
            'icon'  => 'success',
            'title' => trans('huac.success'),
            'text'  => trans('huac.users_successfully_attached'),
            'timer' => 5000
        ], Response::HTTP_OK);
    }
}
