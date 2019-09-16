<?php

namespace HUAC\Http\Controllers\Api\SurgicalRooms;

use Exception;
use HUAC\Actions\UpdateSurgicalRoomStatus;
use HUAC\Models\SurgicalRoom;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateSurgicalRoomStatusController
{
    /**
     * @param Request $request
     * @param SurgicalRoom $room
     * @return JsonResponse
     */
    public function __invoke(Request $request, SurgicalRoom $room)
    {
        try {
            if (Gate::denies('rooms.change-status')) {
                return response()->json([
                    'data' => [
                        'swal' => [
                            'icon' => 'warning',
                            'title' => 'Acesso negado!',
                            'text' => 'Você não possui permissão para realizar esta ação no sistema!',
                            'timer' => 5000,
                        ]
                    ]
                ], Response::HTTP_UNAUTHORIZED);
            }
            $room = UpdateSurgicalRoomStatus::execute($room);

            $message = $room->available ? 'disponível' : 'indisponível';

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => "A sala está {$message} para agendamentos!",
                        'timer' => 5000
                    ],
                    'room' => $room
                ],
            ], Response::HTTP_OK);
        }catch (Exception $exception) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'error',
                        'title' => 'Ops...',
                        'text' => "Algo deu errado, tente novamente mais tarde!",
                        'timer' => 5000
                    ],
                    'exception' => [
                        'line' => $exception->getLine(),
                        'message' => $exception->getMessage(),
                        'trace' => $exception->getTrace(),
                        'code' => $exception->getCode()
                    ]
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
