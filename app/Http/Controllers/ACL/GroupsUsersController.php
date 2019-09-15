<?php

namespace HUAC\Http\Controllers\ACL;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Junges\ACL\Http\Models\Group;

class GroupsUsersController
{
    /**
     * @param Group $group
     * @return Factory|View
     */
    public function users(Group $group)
    {
        if (Gate::denies('group.view-users')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $users = $group->users()->get();
        return view('ACL.groups.users.index')->with([
            'users' => $users,
            'group' => $group
        ]);
    }

}
