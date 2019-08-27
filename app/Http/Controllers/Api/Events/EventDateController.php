<?php

namespace HUAC\Http\Controllers\Api\Events;

use Carbon\Carbon;
use HUAC\Actions\VerifyExistingSchedulesAtRoom;
use HUAC\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventDateController
{
    public function update(Request $request, Event $event)
    {
        $event_start_at = $event->start_at;
        $event_end_at = $event->end_at;

        $event_start_at = Carbon::parse($event_start_at);
        $event_end_at = Carbon::parse($event_end_at);

        $duration = $event_start_at->diffInSeconds($event_end_at);

        $new_start = $request->input('date');
        $new_start = str_replace('T', ' ', $new_start);
        $new_start = Carbon::parse($new_start);

        $new_end = $new_start->addSeconds($duration);

        $room = $request->input('room');

        $surgery = $event->surgery_id;

        $existing_schedules = VerifyExistingSchedulesAtRoom::execute($room, $new_start, $new_end, $surgery);

        if ($existing_schedules) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon'  => 'warning',
                        'title' => 'Conflito de horário!',
                        'text'  => 'Este período já possui cirurgias agendadas!',
                        'timer' => 5000,
                    ],
                    'interval' => [
                        'start' => $new_start,
                        'end'   => $new_end,
                    ]
                ]
            ], Response::HTTP_ACCEPTED);
        }

        $event->start_at = $new_start;
        $event->end_at = $new_end;

        $event->save();

        return response()->json([
            'data' => [
                'swal' => [
                    'icon'  => 'success',
                    'title' => 'Sucesso!',
                    'text'  => 'Data alterada com sucesso!',
                    'timer' => 5000
                ],
                'event' => $event
            ]
        ], Response::HTTP_OK);
    }
}
