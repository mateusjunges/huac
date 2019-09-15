<?php

namespace HUAC\Http\Controllers\Api\Reports;

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
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        else{
            $search = $request->input('search.value');
            $procedures = Procedure::where('name', 'ilike', '%'.$search.'%')
                ->orWhere('average_duration', 'ilike', '%'.$search.'%')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Procedure::where('name', 'ilike', '%'.$search.'%')
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
