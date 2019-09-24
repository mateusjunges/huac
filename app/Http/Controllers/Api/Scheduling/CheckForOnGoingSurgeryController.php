<?php

namespace HUAC\Http\Controllers\Api\Scheduling;

use HUAC\Actions\CheckForOngoingSurgeries;
use HUAC\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckForOnGoingSurgeryController
{
    public function __invoke(Event $event)
    {
        $onGoing = CheckForOngoingSurgeries::execute($event);

        return response()->json([
            'data' => [
                'on_going' =>$onGoing
            ]
        ], Response::HTTP_OK);
    }
}
