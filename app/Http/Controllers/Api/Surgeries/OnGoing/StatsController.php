<?php

namespace HUAC\Http\Controllers\Api\Surgeries\OnGoing;

use Carbon\Carbon;
use Exception;
use HUAC\Enums\Status;
use HUAC\Models\Event;
use HUAC\Models\Surgeon;
use HUAC\Models\Surgery;
use HUAC\Models\User;
use Symfony\Component\HttpFoundation\Response;

class StatsController
{
    /**
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function started($event)
    {
        $event = Event::find($event);
        $surgery = $event->surgery()->first();

        $started = ! is_null($event->surgeon_started_at);
        $finished = ! is_null($event->surgeon_ended_at);
        $started_at = $event->surgeon_started_at;
        if (is_null($event->surgeon_ended_at)){
            $duration = Carbon::parse($event->surgeon_started_at)->diffInSeconds(Carbon::now());
        } else {
            $duration = Carbon::parse($event->surgeon_started_at)
                ->diffInSeconds(
                    Carbon::parse($event->surgeon_ended_at)
                );
        }
        $is_at_surgery_center = ! is_null($event->entrance_at_surgical_center);
        $is_at_surgical_room = ! is_null($event->entrance_at_surgical_room);
        $repai_started = ! is_null($event->entrance_repai);
        $timeout_done = ! is_null($event->time_out_at);
        $intercurrence = (bool) $surgery->status()->where('status_id', Status::SURGICAL_COMPLICATIONS)->count();
        $out_repai = ! is_null($event->exit_repai);
        $out_of_surgery_center = ! is_null($event->exit_surgery_center);
        $out_of_surgical_room = ! is_null($event->exit_surgical_room);
        $anestheticInduction = ! is_null($event->anesthetic_induction);

        return response()->json([
            'data' => [
                'started' => $started,
                'finished' => $finished,
                'startedAt' => $started_at,
                'duration' => $duration,
                'isAtSurgeryCenter' => $is_at_surgery_center,
                'isAtSurgicalRoom' => $is_at_surgical_room,
                'anestheticInduction' => $anestheticInduction,
                'repaiStarted' => $repai_started,
                'timeoutDone' => $timeout_done,
                'intercurrence' => $intercurrence,
                'outOfRepai' => $out_repai,
                'outOfSurgeryCenter' => $out_of_surgery_center,
                'outOfSurgicalRoom' => $out_of_surgical_room
            ]
        ], Response::HTTP_OK);
    }

    /**
     * @param $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function finished($event)
    {
        try{
            $event = Event::find($event);
            $surgery = $event->surgery;
            $procedure = $surgery->procedure;
            $patient = $surgery->patient;
            $timeout = Carbon::parse($event->time_out_at);
            $head_surgeon = $surgery->headSurgeon()->first()->append('name');

            $duration = Carbon::parse($event->surgeon_started_at)
                ->diffInSeconds(
                    Carbon::parse($event->surgeon_ended_at)
                );
            $time_at_repai = Carbon::parse($event->entrance_repai)
                ->diffInSeconds(
                    Carbon::parse($event->exit_repai)
                );
            $time_at_surgery_center = Carbon::parse($event->entrance_at_surgical_center)
                ->diffInSeconds(
                    Carbon::parse($event->exit_surgery_center)
                );
            $time_at_surgical_room = Carbon::parse($event->entrance_at_surgical_room)
                ->diffInSeconds(
                    Carbon::parse($event->exit_surgical_room)
                );
            $anesthetic_duration = Carbon::parse($event->exit_surgery_center)
                ->diffInSeconds(
                    Carbon::parse($event->anesthetic_induction)
                );

            return response()->json([
                'data' => [
                    'surgery' => [
                        'duration' => $duration,
                        'time_at_repai' => $time_at_repai,
                        'time_at_surgery_center' => $time_at_surgery_center,
                        'time_at_surgical_room' => $time_at_surgical_room,
                        'anesthetic_duration' => $anesthetic_duration,
                        'timeout' => $timeout,
                        'surgeons' => [
                            'head_surgeon' => $head_surgeon
                        ]
                    ],
                    'patient' => [
                        'name' => $patient->name,
                    ],
                    'procedure' => [
                        'name' => $procedure->name,
                        'sus_code' => $procedure->sus_code
                    ]
                ]
            ], Response::HTTP_OK);

        }catch (Exception $exception) {

        }
    }

    /**
     * @param $surgery
     * @return \Illuminate\Http\JsonResponse
     */
    public function root($surgery)
    {
        $surgery = Surgery::find($surgery);
        $event = $surgery->events()->latest()->first();

        $finished = ! is_null($event->surgeon_ended_at);
        $out_of_surgery_center = ! is_null($event->exit_surgery_center);

        return response()->json([
            'data' => [
                'finished' => $finished,
                'outOfSurgeryCenter' => $out_of_surgery_center
            ]
        ], Response::HTTP_OK);
    }
}
