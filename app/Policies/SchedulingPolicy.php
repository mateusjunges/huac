<?php

namespace HUAC\Policies;

use HUAC\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulingPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public static function manage(User $user)
    {
        return $user->hasPermission('scheduling')
            or $user->hasPermission('events.create');
    }
}
