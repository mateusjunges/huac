<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anesthesia extends Model
{
    use SoftDeletes;

    protected $table = 'anesthetics';

    protected $fillable = [
        'name',
    ];

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
}
