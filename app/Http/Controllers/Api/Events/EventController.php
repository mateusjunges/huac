<?php

namespace HUAC\Http\Controllers\Api\Events;

use Carbon\Carbon;
use HUAC\Enums\Status;
use HUAC\Models\Event;
use HUAC\Models\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController
{
    /**
     * @param Request $request
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Event $event)
    {
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
            if ($surgery->status() == Status::MATERIALS_CONFIRMED_BY_CME
                || $surgery->status() == Status::MATERIALS_CONFIRMED_SURGERY_CENTER)
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
    }
}
