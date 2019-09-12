<?php

namespace HUAC\Actions;

use Carbon\Carbon;
use HUAC\Enums\Status;
use HUAC\Models\Surgery;

class VerifyExistingSchedulesWithConfirmedMaterialsAtRoom
{
    /**
     * @param $room
     * @param Carbon $start
     * @param Carbon $end
     * @param $surgery
     * @return bool
     */
    public static function execute($room, $start, $end, $surgery)
    {
        $_surgery = Surgery::find($surgery);

        $surgeries = Surgery::room($room)->get()->filter(function ($surgery) {
            return $surgery->latestStatus->status_id === Status::PATIENT_AT_SURGERY_CENTER or
                $surgery->latestStatus->status_id === Status::PATIENT_AT_SURGICAL_ROOM or
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

        foreach ($surgeries as $surgery) {
            if ($surgery->id != $_surgery->id) {
                $surgeryEvent = $surgery->events()->orderBy('created_at', 'desc')->first();
                $surgery_event_start_at = Carbon::parse($surgeryEvent->start_at);
                $surgery_event_end_at = Carbon::parse($surgeryEvent->end_at);
                if ($start->greaterThan($surgery_event_start_at) and $start->lessThan($surgery_event_end_at))
                    return true;
                if ($end->greaterThan($surgery_event_start_at) and $start->lessThan($surgery_event_end_at))
                    return true;
            }
        }
        return false;
    }
}
