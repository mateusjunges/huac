<?php

namespace HUAC\Policies;

use HUAC\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public static function manage(User $user)
    {
        return $user->hasPermission('users.index')
            or $user->hasPermission('users.create');
    }
}
