<?php

namespace HUAC\Http\Controllers\Api\WaitingList;

use HUAC\Enums\Status;
use HUAC\Events\SurgeryRemovedFromWaitingList;
use HUAC\Models\Log;
use HUAC\Models\Surgery;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class WaitingListController
{
    public function destroy(Surgery $surgery)
    {
        if (Gate::denies('waiting-list.delete')) {
            return response()->json([
                'data' => [
                    'icon' => 'warning',
                    'title' => 'Acesso negado!',
                    'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                    'timer' => 5000,
                ]
            ], Response::HTTP_UNAUTHORIZED);
        }

        Log::createFor($surgery, 'Cirurgia cancelada.', Status::CANCELED);

        $surgery->events()->delete();

        event(new SurgeryRemovedFromWaitingList($surgery));

        $surgery->delete();

        return response()->json([
            'code'  => Response::HTTP_OK,
            'timer' => 5000,
            'text'  => 'Cirurgia removida com sucesso!',
            'title' => 'Sucesso!',
            'icon'  => 'success'
        ], Response::HTTP_OK);
    }
}
