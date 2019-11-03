<?php

namespace HUAC\Http\Controllers\Api\Reports;

use Carbon\Carbon;
use HUAC\Models\Views\AverageDurationReport as Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProcedureAverageDurationController
{
    /**
     * @param Request $request
     * @param $procedure
     * @return \Illuminate\Http\JsonResponse
     */
    public function columns(Request $request)
    {
        if (!$request->ajax())
            return response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        $i = -1;

        $columns = array();
        $columns += array(++$i => 'Procedimento');
        $columns += array(
            ++$i => 'Duração média',
        );


        return response(collect($columns)->map(function ($item){
            return ['data' => $item];
        })->toJson(JSON_UNESCAPED_UNICODE));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function data(Request $request)
    {
        $where = null;

        if ($request->input('starting_at') !== null and $request->input('ending_at') !== null) {
            $where =
                [
                    [
                        'start_at', '>=', Carbon::parse($request->input('starting_at'))
                    ],
                    [
                        'end_at', '<=', Carbon::parse($request->input('ending_at'))
                    ]
                ];

        }
        else if ($request->input('ending_at') !== null and $request->input('starting_at') === null) {
            $where = ['end_at', '<=', Carbon::parse($request->input('ending_at'))];
        }
        else if ($request->has('starting_at') !== null and $request->has('ending_at') === null) {
            $where = ['start_at', '>=', Carbon::parse($request->input('starting_at'))];
        }

        $i = -1;
        $columns = array(
            ++$i => "name",
            ++$i => "average_duration"
        );

        $totalData = Procedure::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
                $procedures = Procedure::offset($start)
                    ->where($where)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
        else{
            $search = $request->input('search.value');

            $procedures = Procedure::where('name', 'ilike', '%'.$search.'%')
                ->where($where)
                ->orWhere('average_duration', 'ilike', '%'.$search.'%')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Procedure::where('name', 'ilike', '%'.$search.'%')
                ->where($where)
                ->orWhere('average_duration', 'ilike', '%'.$search.'%')
                ->count();

        }
        $data = array();
        if(!empty($procedures)){
            foreach ($procedures as $procedure){
                $token = csrf_token();

                $nestedData['Procedimento'] = $procedure->name;
                $nestedData['Duração média'] = $procedure->average_duration;

                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        return json_encode($json_data);
    }
}
