<?php

namespace HUAC\Http\Controllers\Api\ACL\Groups;

use Illuminate\Http\Request;
use Junges\ACL\Http\Models\Group;
use Symfony\Component\HttpFoundation\Response;

class GroupsPermissionsController
{
    /**
     * Assign permissions to the specified group.
     * @param Request $request
     * @param Group $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function attach(Request $request, Group $group)
    {
        collect($request->input('permissions'))
            ->map(function ($permission) use ($group) {
                $group->assignPermissions($permission);
            });

        return response()->json([
            'code'  => Response::HTTP_OK,
            'icon'  => 'success',
            'title' => trans('huac.success'),
            'text'  => trans('huac.permissions_successfully_attached'),
            'timer' => 5000,
        ]);
    }

    /**
     * Remove the specified permission from the specified group.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revoke(Request $request)
    {
        try {
            $group = Group::find($request->input('group'));
            $group->revokePermissions($request->input('permission'));
            return response()->json([
                'code' => Response::HTTP_OK,
                'icon' => 'success',
                'title' => trans('huac.success'),
                'text'  => trans('huac.group_permission_removed_successfully'),
                'timer' => 5000,
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'icon' => 'success',
                'title' => trans('huac.error'),
                'text'  => trans('huac.somenthing_went_wrong'),
                'timer' => 5000,
            ]);
        }
    }
}
