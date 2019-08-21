<?php

namespace HUAC\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurgicalRoom extends Model
{
    use SoftDeletes;

    protected $table = 'surgical_rooms';

    protected $fillable = [
        'name',
        'available',
        'morning_reservation_starts_at',
        'morning_reservation_ends_at',
        'afternoon_reservation_starts_at',
        'afternoon_reservation_ends_at',
    ];

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
}
