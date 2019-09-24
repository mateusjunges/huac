<?php

namespace HUAC\Models;

use HUAC\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed entrance_at_surgical_center
 * @property mixed title
 * @property mixed color
 * @property mixed start_at
 * @property mixed end_at
 * @property mixed surgery_id
 * @property mixed surgical_room_id
 * @property mixed entrance_at_surgical_room
 * @property mixed time_out_at
 * @property mixed anesthetic_induction
 * @property mixed surgeon_started_at
 * @property mixed surgeon_ended_at
 * @property mixed exit_surgical_room
 * @property mixed entrance_repai
 * @property mixed exit_repai
 * @property mixed exit_surgery_center
 */
class Event extends Model
{
    use SoftDeletes;

    protected $table = 'events';

    protected $fillable = [
        'title',
        'color',
        'start_at',
        'end_at',
        'doctor_started_at',
        'doctor_ended_at',
        'surgery_id',
        'surgical_room_id',
    ];

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function surgery()
    {
        return $this->belongsTo(Surgery::class);
    }

    /**
     * Return only events where the corresponding surgery has the CONFIRMED status
     * @return mixed
     */
    public function scopeConfirmedMaterials()
    {
        return $this->whereHas('surgery.latestStatus', function ($query){
            $query->where('status_id', Status::MATERIALS_CONFIRMED_BY_SURGERY_CENTER);
        });
    }

    /**
     * Return all events scheduled to the specified room.
     *
     * @param Builder $query
     * @param $room
     * @return Builder
     */
    public function scopeRoom(Builder $query, $room)
    {
        return $query->where('surgical_room_id', $room);
    }
}
