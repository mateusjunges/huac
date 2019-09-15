<?php

namespace HUAC\Http\Controllers\ACL;

use HUAC\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserPermissionsController
{
    public function index(User $user)
    {
        if (Gate::denies('users.view-permissions')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $permissions = $user->permissions()->get();

        return view('ACL.users.permissions.user-permissions')->with([
            'permissions' => $permissions,
            'user'        => $user
        ]);
    }
}
