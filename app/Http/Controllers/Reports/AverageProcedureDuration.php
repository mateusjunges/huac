<?php

namespace HUAC\Http\Controllers\Reports;

use HUAC\Models\Procedure;
use Illuminate\Http\Request;

class AverageProcedureDuration
{
    public function __invoke(Request $request)
    {
        if ($request->has('procedure')){
            return null;
        } else {
            $procedures = Procedure::has('surgeries.events')->get();
            $data = [];
            $procedures->map(function ($procedure) use ($data) {
                $data[$procedure->id] = [
                    'average_duration' => null,
                ];
//                $averageDuration =
            });
        }
    }
}
