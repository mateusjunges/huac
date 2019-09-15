<?php

namespace HUAC\Http\Controllers\Api\CME;

use Exception;
use HUAC\Actions\DenyCMEMaterials;
use HUAC\Enums\Status;
use HUAC\Events\MaterialsDeniedByCME;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DenyCMEMaterialsController
{
    public function __invoke(Request $request, Surgery $surgery)
    {
        try{
            if (Gate::denies('cme.deny-materials')) {
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

            DenyCMEMaterials::execute($surgery,
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
