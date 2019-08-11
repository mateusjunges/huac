<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{

    use SoftDeletes;

    protected $table = 'surgical_rooms';

    protected $fillable = [
        'name',
        'available',
        'morning_reservation_starts_at',
        'morning_reservation_ends_at',
        'afternoon_reservation_starts_at',
        'afternoon_reservation_ends_at'
    ];

}