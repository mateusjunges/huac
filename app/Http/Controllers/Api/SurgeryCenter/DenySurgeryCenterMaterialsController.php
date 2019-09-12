<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter;

use Exception;
use HUAC\Actions\DenySurgeryCenterMaterials;
use HUAC\Enums\Status;
use HUAC\Events\MaterialsDeniedBySurgeryCenter;
use HUAC\Models\Surgery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DenySurgeryCenterMaterialsController
{
    /**
     * @param Request $request
     * @param Surgery $surgery
     * @return JsonResponse
     */
    public function __invoke(Request $request, Surgery $surgery)
    {
        try{

            if (is_null($request->input('observation'))) {
                return response()->json([
                    'data' => [
                        'swal' => [
                            'icon' => 'warning',
                            'title' => 'Verifique o formulário!',
                            'text' => 'Preencha o formulário corretamente!',
                        ]
                    ]
                ], Response::HTTP_ACCEPTED);
            }

            DenySurgeryCenterMaterials::execute($surgery,
                $request->input('observation')
            );

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Os materiais desta cirurgia foram negados!',
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
                    ],
                    'exception' => [
                        'code' => $exception->getCode(),
                        'line' => $exception->getLine(),
                        'message' => $exception->getMessage(),
                        'trace' => $exception->getTrace(),
                    ],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
