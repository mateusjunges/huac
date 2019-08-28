<?php

namespace HUAC\Http\Controllers\Api\Events;

use HUAC\Models\Event;
use HUAC\Models\Status;
use HUAC\Models\User;
use Symfony\Component\HttpFoundation\Response;

class EventHistoryController
{
    public function __invoke(Event $event)
    {
        $surgery = $event->surgery()->first();
        $logs = $surgery->status()->get();

        foreach ($logs as $log) {
            $log->status_name = Status::find($log->status_id)->name;
            $log->user_name = User::find($log->user_id)->name;
        }

        return response()->json([
            'data' => [
                'history' => $logs
            ]
        ], Response::HTTP_OK);
    }
}
