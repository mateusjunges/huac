<?php

namespace HUAC\Http\Controllers\Api\CME;

use Exception;
use HUAC\Actions\ConfirmCMEMaterials;
use HUAC\Models\Surgery;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ConfirmCMEMaterialsController
{
    public function __invoke(Surgery $surgery)
    {
        try {
            if (Gate::denies('cme.confirm-materials')) {
                return response()->json([
                    'data' => [
                        'swal' => [
                            'icon' => 'warning',
                            'title' => 'Acesso negado!',
                            'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                            'timer' => 5000,
                        ]
                    ]
                ], Response::HTTP_UNAUTHORIZED);
            }

            $observation = "Os materiais para esta cirurgia encontram-se disponíveis no CME.";

            $log = ConfirmCMEMaterials::execute($surgery, $observation);

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Materiais confirmados com sucesso!!',
                        'timer' => 5000,
                    ],
                ],
            ], Response::HTTP_OK);
        }catch (Exception $exception) {
            return response()->json([
               'data' => [
                   'swal' => [
                       'icon' => 'error',
                       'title' => 'Ops...',
                       'text' => 'Algo deu errado! Entre em contato com o administrador do sistema!',
                       'timer' => 5000,
                   ],
                   'exception' => [
                       'code' => $exception->getCode(),
                       'line' => $exception->getLine(),
                       'message' => $exception->getMessage(),
                   ]
               ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
