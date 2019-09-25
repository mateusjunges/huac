<?php

namespace HUAC\Http\Controllers\Api\Reports;

use Illuminate\Http\Request;

class SurgeriesReportController
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'data' => [
                'chart' => [
                    'scheduled'          => '',
                    'to_be_scheduled'    => '',
                    'with_complications' => '',
                    'finished'           => ''
                ]
            ]
        ]);
    }
}
