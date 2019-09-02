<?php

namespace HUAC\Http\Controllers\Api\Surgeries\OnGoing;

use Carbon\Carbon;
use HUAC\Enums\Status;
use HUAC\Models\Event;
use HUAC\Models\Surgery;
use Symfony\Component\HttpFoundation\Response;

class StatsController
{
    /**
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke($event)
    {
        $event = Event::find($event);
        $surgery = $event->surgery()->first();

        $started = ! is_null($event->surgeon_started_at);
        $finished = ! is_null($event->surgeon_ended_at);
        $started_at = $event->surgeon_started_at;
        $duration = Carbon::parse($event->surgeon_started_at)->diffInSeconds(Carbon::now());
        $is_at_surgery_center = ! is_null($event->exit_surgery_center);
        $is_at_surgical_room = ! is_null($event->exit_surgical_room);
        $repai_started = ! is_null($event->entrance_repai);
        $timeout_done = ! is_null($event->anesthetic_induction);
        $intercurrence = (bool) $surgery->status()->where('id', Status::INTERCURRENCE)->count();
        $out_repai = ! is_null($event->exit_repai);
        $out_of_surgery_center = ! is_null($event->exit_surgery_center);
        $out_of_surgical_room = ! is_null($event->exit_surgical_room);

        return response()->json([
            'data' => [
                'started' => $started,
                'finished' => $finished,
                'startedAt' => $started_at,
                'duration' => $duration,
                'isAtSurgeryCenter' => $is_at_surgery_center,
                'isAtSurgicalRoom' => $is_at_surgical_room,
                'repaiStarted' => $repai_started,
                'timeoutDone' => $timeout_done,
                'intercurrence' => $intercurrence,
                'outOfRepai' => $out_repai,
                'outOfSurgeryCenter' => $out_of_surgery_center,
                'outOfSurgicalRoom' => $out_of_surgical_room
            ]
        ], Response::HTTP_OK);
    }
}
