<?php

namespace HUAC\Actions;

use Carbon\Carbon;
use HUAC\Models\SurgicalRoom;

class VerifyReservedPeriodBeforeUpdate
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

        if ($morningReservationStartsAt->between($start, $end)
            or $afternoonReservationStartsAt->between($start, $end)
            or $morningReservationEndsAt->between($start, $end)
            or $afternoonReservationEndsAt->between($start, $end)
        )
            return true;
        return false;
    }
}
