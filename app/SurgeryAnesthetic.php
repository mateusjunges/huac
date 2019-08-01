<?php

namespace HUAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurgeryAnesthetic extends Model
{
    use SoftDeletes;

    protected $table = 'surgery_anesthetics';

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    protected $fillable = [
        'anesthesia_id',
        'surgery_id',
    ];
}
