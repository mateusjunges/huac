<?php

namespace HUAC\Http\Controllers\Api\Surgeries;

use HUAC\Models\Surgery;
use Illuminate\Http\Request;
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
