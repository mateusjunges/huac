<?php

namespace HUAC\Models;

use Illuminate\Database\Eloquent\Builder;
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
            $query->where('status_id', env('CONFIRMED'));
        })->get()
            ->filter(function ($event){
                return $event->surgery
                    ->latestStatus
                    ->status_id == env('CONFIRMED');
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
