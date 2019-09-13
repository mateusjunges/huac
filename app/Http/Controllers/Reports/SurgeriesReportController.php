<?php

namespace HUAC\Http\Controllers\Reports;

use HUAC\Enums\Status;
use HUAC\Models\Event;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;

class SurgeriesReportController
{
    public function __invoke()
    {
        $scheduled = Surgery::withStatus([
            Status::SCHEDULED,
            Status::MATERIALS_CONFIRMED_BY_SURGERY_CENTER,
            Status::MATERIALS_CONFIRMED_BY_CME,
            Status::RESCHEDULED,
        ])->get()->filter(function($surgery) {
            return $surgery->latestStatus->status_id ===  Status::SCHEDULED or
            $surgery->latestStatus->status_id ===  Status::MATERIALS_CONFIRMED_BY_SURGERY_CENTER or
            $surgery->latestStatus->status_id ===  Status::MATERIALS_CONFIRMED_BY_CME or
            $surgery->latestStatus->status_id ===  Status::RESCHEDULED;
        })->count();

        $finished = Surgery::withStatus(Status::FINISHED)->count();

        $withComplications = Surgery::withStatus(Status::SURGICAL_COMPLICATIONS)->count();

        return view('reports.surgeries')->with([
            'scheduled' => $scheduled,
            'finished' => $finished,
            'withComplications' => $withComplications
        ]);
    }
}
