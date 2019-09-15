<?php

namespace HUAC\Policies;

use HUAC\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WaitingListPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public static function manage(User $user)
    {
        return $user->hasPermission('waiting-list.index')
            or $user->hasPermission('waiting-list.create');
    }
}
