<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurgeonHasSurgery extends Model
{
    use SoftDeletes;

    protected $table = 'surgeon_has_surgeries';

    protected $fillable = [
        'surgery_id',
        'surgeon_id',
        'head_surgeon',
    ];

    protected $guarded = ['id'];
}
