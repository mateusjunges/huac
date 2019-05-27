<?php

namespace HUAC;

use Illuminate\Notifications\Notifiable;
use Junges\ACL\Traits\UsersTrait;
use Uepg\SGIUser\Models\Usuario;

class User extends Usuario
{
    use Notifiable;
    use UsersTrait;

    /**
     * The attributes that are mass assignable.
     * The 'nome' field is used only for login proposes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'nome',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
