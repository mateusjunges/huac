<?php

namespace HUAC\Http\Controllers\Api\SurgicalRooms;

use HUAC\Models\SurgicalRoom;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DeleteSurgicalRoom
{
    public function __invoke(SurgicalRoom $room)
    {
        if (Gate::denies('patients.delete')) {
            return response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'icon' => 'warning',
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'timer' => 5000,
            ], Response::HTTP_UNAUTHORIZED);
        }

        $room->delete();

        return response()->json([
            'code' => Response::HTTP_OK,
            'icon'  => 'success',
            'title' => 'Sucesso!',
            'text'  => 'Sala removida com sucesso!',
            'timer' => 5000
        ], Response::HTTP_OK);

    }
}
