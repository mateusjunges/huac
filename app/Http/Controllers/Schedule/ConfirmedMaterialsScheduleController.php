<?php

namespace HUAC\Http\Controllers\Schedule;

use HUAC\Models\SurgicalRoom;
use Illuminate\Http\Request;

class ConfirmedMaterialsScheduleController
{
    public function __invoke()
    {
        $surgicalRooms = SurgicalRoom::available()->get();
        $surgicalRoomsJSON = json_encode($surgicalRooms->toArray());

        return view('schedule.confirmed-material-events')->with([
            'surgicalRoomsJSON' => $surgicalRoomsJSON
        ]);
    }
}
