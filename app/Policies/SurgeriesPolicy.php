<?php

namespace HUAC\Policies;

use HUAC\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurgeriesPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public static function manage(User $user)
    {
        return $user->hasPermission('surgeries.create')
            or $user->hasPermission('surgeries.index');
    }
}
