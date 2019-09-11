<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use HUAC\Enums\Status;
use HUAC\Events\SurgeryCenter\SurgicalIntercurrence;
use HUAC\Models\Event;
use HUAC\Models\Log;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class IntercurrenceController
{
    public function __invoke($surgery, Request $request)
    {
//        try {
            $surgery = Surgery::find($surgery);
            $event = $surgery->events()->orderBy('created_at', 'desc')->first();

            if ((int) $request->input('reason') === 1) {
                DB::transaction(function () use ($surgery, $event) {
                    $observation = "O paciente entrou em óbito durante a cirurgia.";

                    Log::createFor($surgery, $observation, Status::SURGICAL_COMPLICATIONS);

                    event(new SurgicalIntercurrence($event));
                });
            } else if ((int) $request->input('reason') === 2) {
                DB::transaction(function () use ($surgery, $event, $request) {
                    $observation = $request->input('observation');

                    Log::createFor($surgery, $observation, Status::SURGICAL_COMPLICATIONS);

                    event(new SurgicalIntercurrence($event));
                });
            }

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon'  => 'success',
                        'title' => 'Sucesso!',
                        'text'  => 'Intercorrência cirúrgica registrada com sucesso!',
                        'timer' => 5000,
                    ]
                ]
            ], Response::HTTP_OK);
//        } catch (\Exception $exception) {
//            return response()->json([
//                'data' => [
//                    'swal' => [
//                        'icon'  => 'error',
//                        'title' => 'Ops...',
//                        'text'  => 'Algo deu errado! Entre em contato com o administrador do sistema!',
//                        'timer' => 5000,
//                    ],
//                    'exception' => [
//                        'code' => $exception->getCode(),
//                        'message' => $exception->getMessage(),
//                        'line' => $exception->getLine(),
//                        'trace' => $exception->getTrace(),
//                    ]
//                ]
//            ], Response::HTTP_INTERNAL_SERVER_ERROR);
//        }
    }
}
