<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;


use HUAC\Http\Resources\UsersResource;
use HUAC\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsersController
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return UsersResource::collection(
            User::all()
        );
    }

    /**
     * Remove the specified user.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if (Gate::denies('users.delete')) {
            return response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'icon' => 'warning',
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'timer' => 5000,
            ]);
        }

        $user->delete();

        return response()->json([
            'code'  => Response::HTTP_OK,
            'text'  => trans('huac.user_successfully_deleted'),
            'timer' => 5000,
            'title' => trans('huac.success'),
            'icon'  => 'success'
        ], Response::HTTP_OK);
    }

}
