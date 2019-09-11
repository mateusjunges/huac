<?php

namespace HUAC\Models;

use Carbon\Carbon;
use HUAC\Enums\Status;
use Illuminate\Database\Eloquent\Collection;
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
     * @param Carbon $start
     * @param Carbon $end
     * @param Surgery $surgery
     * @return bool
     */
    public function isAvailable($start, $end, Surgery $surgery)
    {
        $surgeries = $this->surgeries()->get();
        $currentSurgery = $surgery->id;

        return $this->verifyAvailability($surgeries, $currentSurgery, $start, $end);
    }

    /**
     * @param Carbon $start
     * @param Carbon $end
     * @param Surgery $surgery
     * @return bool
     */
    public function isAvailableWithConfirmedMaterialsOnly(Carbon $start, Carbon $end, Surgery $surgery)
    {
        $surgeries = $this->surgeries()->get()->filter(function ($surgery) {
           return $surgery->latestStatus->status_id === Status::PATIENT_AT_SURGERY_CENTER
               or $surgery->latestStatus->status_id === Status::PATIENT_AT_SURGICAL_ROOM or
                  $surgery->latestStatus->status_id === Status::TIMEOUT_DONE or
                  $surgery->latestStatus->status_id === Status::ANESTHETIC_INDUCTION or
                  $surgery->latestStatus->status_id === Status::STARTED or
                  $surgery->latestStatus->status_id === Status::FINISHED or
                  $surgery->latestStatus->status_id === Status::PATIENT_OUT_OF_SURGICAL_ROOM or
                  $surgery->latestStatus->status_id === Status::PATIENT_EXITED_REPAI or
                  $surgery->latestStatus->status_id === Status::PATIENT_AT_REPAI or
                  $surgery->latestStatus->status_id === Status::PATIENT_EXITED_REPAI or
                  $surgery->latestStatus->status_id === Status::MATERIALS_CONFIRMED_BY_SURGERY_CENTER;
        });
        $currentSurgery = $surgery->id;

        return $this->verifyAvailability($surgeries, $currentSurgery, $start, $end);

    }

    /**
     * @param array|Collection $surgeries
     * @param Surgery $currentSurgery
     * @param Carbon $start
     * @param Carbon $end
     * @return bool
     */
    private function verifyAvailability($surgeries, $currentSurgery, Carbon $start, Carbon $end)
    {
        foreach ($surgeries as $surgery) {
            if ($surgery->id != $currentSurgery) {
                $event = $surgery->events()->orderBy('created_at', 'desc')->first();
                if (! is_null($event)) {
                    $eventStartAt = Carbon::parse($event->start_at);
                    $eventEndAt = Carbon::parse($event->end_at);

                    // The surgeon is available if the start of the surgery isn't between the
                    // Start and End of a scheduled surgery, and if the next surgery is not between
                    // The start and end a scheduled surgery.
                    if (
                        ($start->greaterThan($eventStartAt) and $start->lessThan($eventEndAt))
                        or
                        ($end->greaterThan($eventStartAt) and $end->lessThan($eventEndAt))
                    )
                        return false;
                }
            }
        }
        return true;
    }
}
