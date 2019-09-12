<?php

namespace HUAC\Http\Controllers\Api\CME;

use Exception;
use HUAC\Actions\ConfirmCMEMaterials;
use HUAC\Events\MaterialsConfirmedByCME;
use HUAC\Models\Surgery;
use Symfony\Component\HttpFoundation\Response;

class ConfirmCMEMaterialsController
{
    public function __invoke(Surgery $surgery)
    {
        try {
            $observation = "Os materiais para esta cirurgia encontram-se disponíveis no CME.";

            $log = ConfirmCMEMaterials::execute($surgery, $observation);

            event(new MaterialsConfirmedByCME($surgery));

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
