<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;

    protected $table = 'logs';

    protected $guarded = ['id'];

    protected $fillable = [
        'observation',
        'surgery_id',
        'status_id',
        'user_id',
    ];

    protected $dates = ['deleted_at'];
}
