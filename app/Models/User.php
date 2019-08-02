<?php

namespace HUAC\Models;

use Illuminate\Notifications\Notifiable;
use Junges\ACL\Traits\UsersTrait;
use Laravel\Passport\HasApiTokens;
use Uepg\SGIUser\Models\Usuario;

class User extends Usuario
{
    use Notifiable;
    use UsersTrait;
    use HasApiTokens;

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
