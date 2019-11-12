<?php

namespace HUAC\Models;

use HUAC\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Junges\ACL\Traits\UsersTrait;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use UsersTrait;
    use HasApiTokens;
    use SoftDeletes;

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
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
