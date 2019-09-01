<?php

namespace HUAC\Http\Controllers\Schedule;

use Illuminate\Http\Request;

class ConfirmedMaterialsScheduleController
{
    public function __invoke()
    {
        return view('schedule.confirmed-material-events');
    }
}
