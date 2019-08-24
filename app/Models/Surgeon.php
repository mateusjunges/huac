<?php

namespace HUAC\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surgeon extends Model
{

    use SoftDeletes;

    protected $table = 'surgeons';

    protected $fillable = [
        'crm',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scopeName()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return the surgeon name.
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->user()->first()->name;
    }

    public function surgeries()
    {
        return $this->belongsToMany(Surgery::class, 'surgeon_has_surgeries');
    }

    /**
     * Determine if the surgeon is available in a specific time interval.
     * @param $start
     * @param $end
     * @param Surgery $surgery
     */
    public function isAvailable($start, $end, Surgery $surgery)
    {
        $surgeries = $this->surgeries()->get();
        $currentSurgery = $surgery->id;

        foreach ($surgeries as $surgery) {
            if ($surgery->id != $currentSurgery) {
                $event = $surgery->events()->last();
                if (! is_null($event)) {
                    $eventStartAt = Carbon::parse($event->start_at);
                    $eventEndAt = Carbon::parse($event->end_at);

                    // The surgeon is available if the start of the surgery isn't between the
                    // Start and End of a scheduled surgery, and if the next surgery is not between
                    // The start and end a scheduled surgery.
                    if ($start->greaterThan($eventStartAt) and $start->lessThan($eventEndAt))
                        return false;
                    else if ($end->greaterThan($eventStartAt) and $end->lessThan($eventEndAt))
                        return false;
                }
            }
        }
        return true;
    }
}
