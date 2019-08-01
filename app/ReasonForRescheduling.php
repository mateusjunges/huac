<?php

namespace HUAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReasonForRescheduling extends Model
{
    use SoftDeletes;

    protected $table = 'reasons_for_rescheduling';

    protected $guarded = ['id'];

    protected $fillable = [
      'name',
      'description',
    ];

    protected $dates = ['deleted_at'];
}
