<?php

namespace HUAC\Http\Controllers\Reports;

use HUAC\Models\Views\AverageDurationReport;
use Illuminate\Http\Request;

class AverageProcedureDuration
{
    public function __invoke(Request $request)
    {
        if ($request->has('procedure')){
            return null;
        } else {
            $duration = AverageDurationReport::all();

            $procedures = AverageDurationReport::select('name', 'procedure_id')->get();

            return view('')->with([
                'procedures' => $procedures,
                'duration'   => $duration,
            ]);

        }
    }
}
