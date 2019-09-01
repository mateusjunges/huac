<?php

namespace HUAC\Http\Controllers\Api\Procedures;

use Exception;
use HUAC\Http\Resources\ProceduresResource;
use HUAC\Models\Procedure;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProceduresController
{
    /**
     * Return all the stored procedures.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all()
    {
        return ProceduresResource::collection(
            Procedure::all()
        );
    }

    /**
     * Return the specified procedure
     * @param $id
     * @return ProceduresResource
     */
    public function find($id)
    {
        return new ProceduresResource(
            Procedure::find($id)
        );
    }

    /**
     * @param Procedure $procedure
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Procedure $procedure)
    {
        $procedure->delete();

        return response()->json([
            'data' => [
                'swal' => [
                    'icon'  => 'success',
                    'title' => 'Sucesso!',
                    'text'  => 'Procedimento removido com sucesso!',
                    'timer' => 5000
                ]
            ]
        ], Response::HTTP_OK);
    }
}
