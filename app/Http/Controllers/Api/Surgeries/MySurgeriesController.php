<?php

namespace HUAC\Http\Controllers\Api\Surgeries;

use Carbon\Carbon;
use Exception;
use HUAC\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class MySurgeriesController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        try {
            if (Gate::denies('surgeries.my-surgeries')) {
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

            $start = str_replace('T', ' ', $request->input('start'));
            $end = str_replace('T', ' ', $request->input('end'));

            $start = Carbon::parse($start);
            $end = Carbon::parse($end);

            $events = Event::whereHas('surgery.surgeons', function($query) {
                $query->where('surgeon_id', Auth::id());
            })
                ->where('start_at', '>=', $start->subWeek())
                ->where('end_at', '<=', $end->addWeek())
                ->select('id', 'start_at as start', 'end_at as end', 'color', 'title', 'surgery_id')
                ->get();

            return response()->json([
                'data' => [
                    'events' => $events,
                ]
            ], Response::HTTP_OK);

        } catch (Exception $exception) {
            return response()->json([
                'data' => [
                    'exception' => [
                        'code'    => $exception->getCode(),
                        'line'    => $exception->getLine(),
                        'message' => $exception->getMessage(),
                        'trace'   => $exception->getTrace()
                    ]
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
