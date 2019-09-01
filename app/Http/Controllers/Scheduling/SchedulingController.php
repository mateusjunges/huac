<?php

namespace HUAC\Http\Controllers\Scheduling;

use HUAC\Enums\Status;
use HUAC\Http\Requests\SurgicalRoomRequest;
use HUAC\Http\Resources\SurgicalRoomsResource;
use HUAC\Models\Surgery;
use HUAC\Models\SurgicalRoom;

class SchedulingController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $surgeriesWithDeniedMaterials = Surgery::withDeniedMaterials()->with('patient')->get()
            ->filter(function ($surgery) {
                $latestStatus = $surgery->latestStatus->status_id;

                return $latestStatus == Status::MATERIALS_DENIED_BY_SURGERY_CENTER
                || $latestStatus == Status::MATERIALS_DENIED_BY_CME
                || $latestStatus == Status::RESCHEDULED_AFTER_MATERIALS_CONFIRMATION;
            });
        $surgeries = Surgery::with('patient')->get()
            ->filter(function ($surgery) {
                return $surgery->latestStatus->status_id === Status::IN_PROCESS
                    or $surgery->latestStatus->status_id === Status::DELETED;
            });

        $surgeriesInWaitingList = Surgery::withStatus(Status::WAITING_LIST)->with('patient')->get()
            ->filter(function ($surgery) {
                return $surgery->latestStatus->status_id == Status::WAITING_LIST;
            });

        $surgicalRooms = SurgicalRoom::available()->get();
        $surgicalRoomsJSON = json_encode($surgicalRooms->toArray());

        return view('scheduling.scheduling')->with([
            'surgeries'                    => $surgeries,
            'surgeriesWithDeniedMaterials' => $surgeriesWithDeniedMaterials,
            'surgeriesInWaitingList'       => $surgeriesInWaitingList,
            'surgicalRooms'                => $surgicalRooms,
            'surgicalRoomsJSON'            => $surgicalRoomsJSON
        ]);
    }
}
