<?php

namespace HUAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surgeon extends Model
{

    use SoftDeletes;

    protected $table = 'surgeons';

    protected $fillable = [
        'crm',
        'user_id',
    ];
}
