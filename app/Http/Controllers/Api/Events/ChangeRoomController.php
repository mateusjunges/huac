<?php

namespace HUAC\Http\Controllers\Api\Events;

use HUAC\Events\RoomChangedEvent;
use HUAC\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ChangeRoomController
{
    public function __invoke(Request $request, Event $event)
    {
        if (Gate::denies('events.change-room')) {
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

        if (is_null($request->input('surgical_room_id'))) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'error',
                        'title' => 'Informe a sala!',
                        'text' => 'Por favor, informe a sala cirúrgica desejada!',
                    ]
                ],
                'validator' => [
                    'surgical_room' => 'Informe a sala cirúrgica!'
                ]
            ], Response::HTTP_OK);
        }

        $event->surgical_room_id = $request->input('surgical_room_id');
        $event->save();

        event(new RoomChangedEvent($event));

        return response()->json([
            'data' => [
                'swal' => [
                    'icon' => 'success',
                    'title' => 'Sucesso!',
                    'text' => 'A sala cirúrgica foi alterada!',
                ],
            ]
        ], Response::HTTP_OK);
    }
}
