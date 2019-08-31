<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter;

use Exception;
use HUAC\Actions\ConfirmSurgeryCenterMaterials;
use HUAC\Events\MaterialsConfirmedBySurgeryCenter;
use HUAC\Models\Surgery;
use Symfony\Component\HttpFoundation\Response;

class ConfirmSurgeryCenterMaterialsController
{
    /**
     * @param Surgery $surgery
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Surgery $surgery)
    {
        try {
            $observation = "Os materiais para esta cirurgia encontram-se disponíveis no Centro Cirúrgico.";

            $log = ConfirmSurgeryCenterMaterials::execute($surgery, $observation);

            event(new MaterialsConfirmedBySurgeryCenter($surgery));

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
