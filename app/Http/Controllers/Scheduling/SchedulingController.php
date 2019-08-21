<?php

namespace HUAC\Http\Controllers\Scheduling;

use Illuminate\Http\Request;

class SchedulingController
{
    public function __invoke()
    {
        return view('scheduling.scheduling');
    }
}
