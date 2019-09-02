<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use HUAC\Events\SurgeryCenter\AnestheticInduction;
use HUAC\Models\Event;
use Illuminate\Http\Request;

class AnestheticInductionController
{
    public function __invoke(Event $event)
    {
        event(new AnestheticInduction($event));
    }
}
