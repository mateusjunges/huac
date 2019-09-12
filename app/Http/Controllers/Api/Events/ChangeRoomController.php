<?php

namespace HUAC\Http\Controllers\Api\Events;

use HUAC\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangeRoomController
{
    public function __invoke(Request $request, Event $event)
    {
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
