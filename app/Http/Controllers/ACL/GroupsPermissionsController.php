<?php

namespace HUAC\Http\Controllers\ACL;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Junges\ACL\Http\Models\Group;
use Symfony\Component\HttpFoundation\Response;

class GroupsPermissionsController
{
    /**
     * Return the view with all group permissions.
     * @param Group $group
     * @return Factory|View
     */
    public function index(Group $group)
    {
        if (Gate::denies('groups.view-permissions')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $permissions = $group->permissions()->get();

        return view('ACL.groups.permissions.group-permissions')->with([
            'permissions' => $permissions,
            'group'       => $group
        ]);
    }

    /**
     * Revoke group permissions
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revoke(Request $request)
    {
        try{
            if (Gate::denies('groups.revoke-permissions')) {
                return response()->json([
                    'code'  => Response::HTTP_UNAUTHORIZED,
                    'text'  => 'Você não tem permissão para executar esta ação no sistema!',
                    'title' => 'Acesso negado!',
                    'timer' => 5000,
                    'icon'  => 'warning',
                ]);
            }

            $group = Group::find($request->input('group_id'));

            $group->revokePermissions($request->input('permissions'));

            return response()->json([
                'code'  => Response::HTTP_OK,
                'text'  => trans('huac.permission_revoked_successfully'),
                'title' => trans('huac.success'),
                'timer' => 5000,
                'icon'  => 'success',
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'code'  => Response::HTTP_INTERNAL_SERVER_ERROR,
                'text'  => trans('huac.something_went_wrong'),
                'title' => trans('huac.error'),
                'timer' => 5000,
                'icon'  => 'error',
            ]);
        }
    }
}
