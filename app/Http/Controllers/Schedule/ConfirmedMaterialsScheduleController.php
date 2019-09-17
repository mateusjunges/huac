<?php

namespace HUAC\Http\Controllers\Schedule;

use HUAC\Models\SurgicalRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConfirmedMaterialsScheduleController
{
    public function __invoke()
    {
        if (Gate::denies('schedule.confirmed-materials')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $surgicalRooms = SurgicalRoom::available()->get();
        $surgicalRoomsJSON = json_encode($surgicalRooms->toArray());

        return view('schedule.confirmed-material-events')->with([
            'surgicalRoomsJSON' => $surgicalRoomsJSON
        ]);
    }
}
