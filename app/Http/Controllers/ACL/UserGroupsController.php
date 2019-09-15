<?php

namespace HUAC\Http\Controllers\ACL;

use HUAC\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserGroupsController
{
    public function index(User $user)
    {
        if (Gate::denies('users.view-groups')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }
        $groups = $user->groups()->get();

        return view('ACL.users.groups.user-groups')->with([
           'groups' => $groups,
           'user'   => $user,
        ]);
    }
}
