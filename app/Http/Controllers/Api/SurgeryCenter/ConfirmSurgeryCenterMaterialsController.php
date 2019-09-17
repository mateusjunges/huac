<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter;

use Exception;
use HUAC\Actions\ConfirmSurgeryCenterMaterials;
use HUAC\Models\Surgery;
use Illuminate\Support\Facades\Gate;
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
            if (Gate::denies('surgery-center.confirm-materials')) {
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

            $observation = "Os materiais para esta cirurgia encontram-se disponíveis no Centro Cirúrgico.";

            $log = ConfirmSurgeryCenterMaterials::execute($surgery, $observation);

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
