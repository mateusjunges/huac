<?php

namespace HUAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurgeonSurgery extends Model
{
    use SoftDeletes;

    protected $table = 'surgeon_surgeries';

    protected $fillable = [
        'surgery_id',
        'surgeon_id',
        'head_surgeon',
    ];

    protected $guarded = ['id'];
}
