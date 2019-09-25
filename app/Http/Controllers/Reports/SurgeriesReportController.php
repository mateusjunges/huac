<?php

namespace HUAC\Http\Controllers\Reports;

use Carbon\Carbon;
use HUAC\Enums\Status;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;

class SurgeriesReportController
{
    public function __invoke(Request $request)
    {
        $starting_at = $ending_at = null;
        if ($request->has('starting_at'))
            $starting_at = Carbon::parse($request->input('starting_at'));
        if ($request->has('ending_at'))
            $ending_at = Carbon::parse($request->input('ending_at'));

        $scheduled = Surgery::withStatus([
            Status::SCHEDULED,
            Status::MATERIALS_CONFIRMED_BY_SURGERY_CENTER,
            Status::MATERIALS_CONFIRMED_BY_CME,
            Status::RESCHEDULED,
        ]);

        $finished = Surgery::withStatus(Status::FINISHED);

        $withComplications = Surgery::withStatus(Status::SURGICAL_COMPLICATIONS);

        $toBeScheduled = Surgery::withStatus(Status::IN_PROCESS);


        if (!is_null($starting_at) and !is_null($ending_at)) {
            $scheduled = $scheduled->where([
                ['created_at', '>=', $starting_at],
                ['created_at', '<=', $ending_at],
            ]);
            $finished = $finished->where([
                ['created_at', '>=', $starting_at],
                ['created_at', '<=', $ending_at],
            ]);
            $withComplications = $withComplications->where([
                ['created_at', '>=', $starting_at],
                ['created_at', '<=', $ending_at],
            ]);
            $toBeScheduled = $toBeScheduled->where([
                ['created_at', '>=', $starting_at],
                ['created_at', '<=', $ending_at],
            ]);
        }

        $finished = $finished->count();

        $withComplications = $withComplications->count();

        $scheduled = $scheduled->get()->filter(function($surgery) {
            return $surgery->latestStatus->status_id ===  Status::SCHEDULED or
                $surgery->latestStatus->status_id ===  Status::MATERIALS_CONFIRMED_BY_SURGERY_CENTER or
                $surgery->latestStatus->status_id ===  Status::MATERIALS_CONFIRMED_BY_CME or
                $surgery->latestStatus->status_id ===  Status::RESCHEDULED;
        })->count();

        $toBeScheduled = $toBeScheduled->get()->filter(function($surgery) {
            return $surgery->latestStatus->status_id === Status::IN_PROCESS;
        })->count();

        return view('reports.surgeries')->with([
            'scheduled'         => $scheduled,
            'finished'          => $finished,
            'withComplications' => $withComplications,
            'toBeScheduled'     => $toBeScheduled
        ]);
    }
}
