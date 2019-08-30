<?php

namespace HUAC\Http\Controllers\Api\Surgeries;

use HUAC\Events\SurgeryDeletedEvent;
use HUAC\Models\Surgery;
use Symfony\Component\HttpFoundation\Response;

class SurgeriesController
{
    /**
     * @param Surgery $surgery
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Surgery $surgery)
    {
        $surgery->events()->delete();

        event(new SurgeryDeletedEvent($surgery));

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
