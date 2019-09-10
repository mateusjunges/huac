<?php

namespace HUAC\Actions;

use Carbon\Carbon;
use HUAC\Models\SurgicalRoom;

class VerifyReservedPeriod
{
    /**
    * VerifyReservedPeriodBeforeUpdate constructor
    */
    public function __construct()
    {
        //
    }

    public static function execute(SurgicalRoom $room, $start, $end)
    {
        $morningReservationStartsAt   = Carbon::parse($room->morning_reservation_starts_at);
        $morningReservationEndsAt   = Carbon::parse($room->morning_reservation_ends_at);
        $afternoonReservationStartsAt = Carbon::parse($room->afternoon_reservation_starts_at);
        $afternoonReservationEndsAt = Carbon::parse($room->afternoon_reservation_ends_at);

        if (
            ($morningReservationStartsAt->greaterThan($start) and $morningReservationStartsAt->lessThan($end))
            or ($morningReservationEndsAt->greaterThan($start) and $morningReservationEndsAt->lessThan($end))
            or ($afternoonReservationStartsAt->greaterThan($start) and $afternoonReservationEndsAt->lessThan($end)
            or ($afternoonReservationEndsAt->greaterThan($start) and $afternoonReservationEndsAt->lessThan($end)))
        )
            return true;
        return false;
    }
}
