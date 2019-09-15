<?php

namespace HUAC\Policies;

use HUAC\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConfirmMaterialsPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public static function manage(User $user)
    {
        return $user->hasPermission('cme.view-pending-surgeries')
            or $user->hasPermission('surgery-center.view-pending-surgeries');
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function cme(User $user)
    {
        return $user->hasPermission('cme.deny-materials')
            or $user->hasPermission('cme.view-pending-surgeries')
            or $user->hasPermission('cme.confirm-materials');
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function surgeryCenter(User $user)
    {
        return $user->hasPermission('surgery-center.deny-materials')
            or $user->hasPermission('surgery-center.view-pending-surgeries')
            or $user->hasPermission('surgery-center.confirm-materials');
    }
}
