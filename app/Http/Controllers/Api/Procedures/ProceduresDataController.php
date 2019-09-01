<?php

namespace HUAC\Http\Controllers\Api\Procedures;

use HUAC\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProceduresDataController
{
    public function __invoke(Request $request)
    {
        $i = -1;
        $columns = array(
            ++$i => "name",
        );
        if(Gate::allows('procedures.update'))
            $columns += array(++$i => 'id');
        if(Gate::allows('procedures.delete'))
            $columns += array(++$i => 'id');
        $columns += array(
            ++$i => 'sus_code',
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
                ->orWhere('sus_code', 'ilike', '%'.$search.'%')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Procedure::where('name', 'ilike', '%'.$search.'%')
                ->orWhere('sus_code', 'ilike', '%'.$search.'%')
                ->count();
        }
        $data = array();
        if(!empty($procedures)){
            foreach ($procedures as $procedure){
                $edit = route('procedures.edit', $procedure->id);
                $token = csrf_token();

                $nestedData['Nome'] = $procedure->name;
                if (Gate::allows('procedures.update'))
                    $nestedData['Editar'] = "<a href='{$edit}'>
                                                            <button class='btn btn-primary btn-sm' 
                                                                    data-toggle='tooltip'
                                                                    title='Editar procedimento'
                                                                    data-placement='top'>
                                                                <i class='fa fa-edit'></i>
                                                            </button>
                                                       </a>";
                if (Gate::allows('procedures.delete'))
                    $nestedData['Remover'] = "<button class='btn btn-danger btn-sm delete'
                                                                data-placement='top'
                                                                data-toggle='tooltip'
                                                                data-route='procedures'
                                                                data-type='procedimento'
                                                                data-name='{$procedure->name}'
                                                                data-gender='a'
                                                                value='{$token}'
                                                                title='Remover este procedimento' 
                                                                name='delete' 
                                                                data-id='{$procedure->id}'
                                                                type='button' 
                                                                id='delete{$procedure->id}'>
                                                            <i class='fa fa-trash'></i>
                                                        </button>";
                $nestedData['Código SUS'] = $procedure->sus_code;

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
