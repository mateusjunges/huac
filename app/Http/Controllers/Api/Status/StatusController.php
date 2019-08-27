<?php

namespace HUAC\Http\Controllers\Api\Status;

use HUAC\Http\Resources\StatusResource;
use HUAC\Models\Status;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusController
{
    public function index()
    {
        try {
            $status = StatusResource::collection(
                Status::all()
            );

            return response()->json([
                'data' => [
                    'status' => $status,
                ],
            ], Response::HTTP_OK);
        }catch (\Exception $exception) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'error',
                        'title' => 'Ops...',
                        'text' => 'Algo deu errado. Entre em contato com o administrador do sistema!',
                        'timer' => 5000
                    ],
                    'exception' => [
                        'code' => $exception->getCode(),
                        'message' => $exception->getMessage(),
                        'line' => $exception->getLine(),
                    ],
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
