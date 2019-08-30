<?php

namespace HUAC\Http\Controllers\Api\Events;

use Carbon\Carbon;
use HUAC\Enums\Status;
use HUAC\Events\SurgeryScheduledEvent;
use HUAC\Models\Event;
use HUAC\Models\Log;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EventController
{

    /**
     * Store a newly created resource.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $request->request->set('start', str_replace('T', ' ', $request->input('event.start')));
            $request->request->set('end', str_replace('T', ' ', $request->input('event.end')));

            $duration = $request->input('event.estimated_duration');
            $start = Carbon::parse($request->input('start'));
            $end = Carbon::parse($request->input('end'))->addHours($duration);

            $event = null;

            DB::transaction(function() use ($request, $start, $end, $event) {
                $event = Event::create([
                    'title'            => $request->input('event.title'),
                    'color'            => $request->input('event.color'),
                    'start_at'         => $start,
                    'end_at'           => $end,
                    'surgery_id'       => $request->input('event.surgery_id'),
                    'surgical_room_id' => $request->input('event.surgical_room'),
                ]);

                $surgery = Surgery::find($request->input('event.surgery_id'));
                Log::createFor($surgery, "Cirurgia agendada.", Status::SCHEDULED);

                event(new SurgeryScheduledEvent($event));
            });

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'timer' => 5000,
                        'title' => 'Sucesso!',
                        'text' => 'Cirurgia agendada com sucesso!',
                    ],
                    'event' => $event,
                ]
            ], Response::HTTP_OK);

        }catch (\Exception $exception) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'error',
                        'timer' => 5000,
                        'title' => 'Ops...',
                        'text' => 'Algo deu errado! Contate o administrador do sistema!',
                    ],
                    'exception' => [
                        'code' => $exception->getCode(),
                        'message' => $exception->getMessage(),
                        'line' => $exception->getLine(),
                    ]
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * @param Request $request
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Event $event)
    {
        try {
            $request->request->set('start', str_replace('T', ' ', $request->input('event.start')));
            $request->request->set('end', str_replace('T', ' ', $request->input('event.end')));

            $start = Carbon::parse($request->input('start'));
            $end = Carbon::parse($request->input('end'));

            $sameDay = false;
            $surgery = $event->surgery()->first();
            if ($start->format('d/m/Y') == Carbon::parse($event->start_at)->format('d/m/Y'))
                $sameDay = true;

            if ($sameDay)
                $log = Log::createFor($surgery, "Cirurgia reagendada.", Status::RESCHEDULED);
            else {
                if ($surgery->latestStatus->status_id == Status::MATERIALS_CONFIRMED_BY_CME
                    || $surgery->latestStatus->status_id == Status::MATERIALS_CONFIRMED_SURGERY_CENTER)
                    $log = Log::createFor($surgery,
                        "Cirurgia reagendada após confirmação de materiais.",
                        Status::RESCHEDULED_AFTER_MATERIALS_CONFIRMATION
                    );
                else
                    $log = Log::createFor($surgery, "Cirurgia reagendada.", Status::RESCHEDULED);
            }

            $event->start_at = $start;
            $event->end_at = $end;
            $event->save();

            return response()->json([
                'data' => [
                    'icon'   => 'success',
                    'title'  => 'Sucesso!',
                    'text'   => 'Evento atualizado com sucesso!',
                    'timer'  => 5000,
                    'event'  => $event,
                    'log_id' => $log->id
                ]
            ], Response::HTTP_OK);

        } catch (\Exception $exception) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'error',
                        'timer' => 5000,
                        'title' => 'Ops...',
                        'text' => 'Algo deu errado! Contate o administrador do sistema!',
                    ],
                    'exception' => [
                        'code' => $exception->getCode(),
                        'message' => $exception->getMessage(),
                        'line' => $exception->getLine(),
                    ]
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Event $event)
    {
         $surgery = $event->surgery;
         $event->delete();

         Log::createFor($surgery, 'Agendamento removido.', Status::DELETED);

         return response()->json([
             'data' => [
                 'swal' => [
                     'icon'   => 'success',
                     'title'  => 'Sucesso!',
                     'text'   => 'Evento removido com sucesso. Se necessário, a cirurgia pode ser agendada novamente!',
                     'timer'  => 5000,
                 ]
             ]
         ], Response::HTTP_OK);
    }
}
