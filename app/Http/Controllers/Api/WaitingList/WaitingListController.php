<?php

namespace HUAC\Http\Controllers\Api\WaitingList;

use HUAC\Enums\Status;
use HUAC\Events\SurgeryRemovedFromWaitingList;
use HUAC\Models\Log;
use HUAC\Models\Surgery;
use Symfony\Component\HttpFoundation\Response;

class WaitingListController
{
    public function destroy(Surgery $surgery)
    {
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
