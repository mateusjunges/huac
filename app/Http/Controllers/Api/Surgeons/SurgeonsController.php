<?php

namespace HUAC\Http\Controllers\Api\Surgeons;

use HUAC\Http\Resources\SurgeonsResource;
use HUAC\Models\Surgeon;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SurgeonsController
{
    /**
     * Return all the stored surgeons.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all()
    {
        return SurgeonsResource::collection(
            Surgeon::all()
        );
    }

    /**
     * Return the specified surgeon.
     * @param $id
     * @return SurgeonsResource
     */
    public function find($id)
    {
        return new SurgeonsResource(
            Surgeon::find($id)
        );
    }

    /**
     * @param Surgeon $surgeon
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Surgeon $surgeon)
    {
        if (Gate::denies('surgeons.delete')) {
            return response()->json([
                'icon' => 'warning',
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'timer' => 1000,
            ], Response::HTTP_UNAUTHORIZED);
        }

        $surgeon->delete();

        return response()->json([
            'code'  => Response::HTTP_OK,
            'icon'  => 'success',
            'title' => 'Sucesso!',
            'text'  => 'Médico removido com sucesso!',
            'timer' => 1000
        ], Response::HTTP_OK);
    }
}
