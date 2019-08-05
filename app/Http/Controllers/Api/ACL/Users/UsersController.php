<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;

use HUAC\Http\Requests\UsersRequest;
use HUAC\Http\Resources\UsersResource;
use HUAC\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UsersController
{
    public function store(UsersRequest $request)
    {
        $user = User::create($request->all());
        return response()->json([
            'code'  => Response::HTTP_OK,
            'icon'  => 'success',
            'text'  => 'Usuário adicionado com sucesso!',
            'title' => 'Sucesso!',
            'timer' => 5000,
            'user'  => new UsersResource($user)
        ]);
    }
}
