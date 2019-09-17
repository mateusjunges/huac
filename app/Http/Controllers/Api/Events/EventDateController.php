<?php

namespace HUAC\Http\Controllers\Api\Events;

use Carbon\Carbon;
use HUAC\Actions\VerifyExistingSchedulesAtRoom;
use HUAC\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EventDateController
{
    public function update(Request $request, Event $event)
    {
        if (Gate::denies('events.update')) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'warning',
                        'title' => 'Acesso negado!',
                        'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                        'timer' => 5000,
                    ]
                ]
            ], Response::HTTP_UNAUTHORIZED);
        }

        $event_start_at = $event->start_at;
        $event_end_at = $event->end_at;

        $event_start_at = Carbon::parse($event_start_at);
        $event_end_at = Carbon::parse($event_end_at);

        $duration = $event_end_at->diffInSeconds($event_start_at);

        $new_start = $request->input('date');
        $new_start = str_replace('T', ' ', $new_start);
        $start = Carbon::parse($new_start);

        $new_end = Carbon::parse($new_start)->addSeconds($duration);

        $room = $request->input('room');

        $surgery = $event->surgery_id;

        $existing_schedules = VerifyExistingSchedulesAtRoom::execute($room, $start, $new_end, $surgery);

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

        $event->start_at = $start;
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
