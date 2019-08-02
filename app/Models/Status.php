<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;

    protected $table = 'false';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $dates = ['deleted_at'];
}
