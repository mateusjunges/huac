<?php

namespace HUAC\Http\Controllers\Scheduling;

use HUAC\Enums\Status;
use HUAC\Models\Surgery;
use HUAC\Models\SurgicalRoom;

class SchedulingController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $surgeriesWithDeniedMaterials = Surgery::withDeniedMaterials()->get()
            ->filter(function ($surgery) {
                $latestStatus = $surgery->latestStatus->status_id;

                return $latestStatus == Status::MATERIALS_DENIED_BY_SURGERY_CENTER
                || $latestStatus == Status::MATERIALS_DENIED_BY_CME
                || $latestStatus == Status::RESCHEDULED_AFTER_MATERIALS_CONFIRMATION;
            });

        $surgeries = Surgery::withStatus(Status::IN_PROCESS)->get()
            ->filter(function ($surgery) {
                return $surgery->latestStatus->status_id === Status::IN_PROCESS;
            });

        $surgeriesInWaitingList = Surgery::withStatus(Status::WAITING_LIST)->get()
            ->filter(function ($surgery) {
                return $surgery->latestStatus->status_id == Status::WAITING_LIST;
            });

        $surgicalRooms = SurgicalRoom::available()->get();

        return view('scheduling.scheduling')->with([
            'surgeries'                    => $surgeries,
            'surgeriesWithDeniedMaterials' => $surgeriesWithDeniedMaterials,
            'surgeriesInWaitingList'       => $surgeriesInWaitingList,
            'surgicalRooms'                => $surgicalRooms
        ]);
    }
}
