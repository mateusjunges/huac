<?php

namespace HUAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $table = 'events';

    protected $fillable = [
        'title',
        'color',
        'start_at',
        'end_at',
        'doctor_start_at',
        'doctor_end_at',
        'doctor_started_at',
        'doctor_ended_at',
        'surgery_id',
        'surgical_room_id',
    ];

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
}
