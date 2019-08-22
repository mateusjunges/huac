<?php

namespace HUAC\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Local available scope.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeAvailable(Builder $query)
    {
        return $query->where('available', true);
    }

    /**
     * Return all events scheduled to the specified room.
     *
     * @param Builder $query
     * @param $room
     * @return Builder
     */
    public function room(Builder $query, $room)
    {
        return $query->where('room_id', $room);
    }

}
