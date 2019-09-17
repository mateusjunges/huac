<?php

namespace HUAC\Policies;

use HUAC\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientsPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public static function manage(User $user)
    {
        if ($user->hasPermission('patients.index')
         or $user->hasPermission('patients.create'))
            return true;
        return false;
    }
}
