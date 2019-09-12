<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReschedulingHistory extends Model
{
    use SoftDeletes;

    protected $table = 'rescheduling_history';

    protected $guarded = ['id'];

    protected $fillable = [
        'rescheduling_reason_id',
        'log_id',
    ];

    protected $dates = ['deleted_at'];
}
