<?php

namespace HUAC\Http\Controllers\Api\Surgeries;

use Gate;
use HUAC\Models\Surgery;
use HUAC\Models\User;
use HUAC\Models\Views\Surgeries;
use Illuminate\Http\Request;

class SurgeriesDataController
{
    public function __invoke(Request $request)
    {
        $i = -1;
        $columns = array(
            ++$i => "patient_name",
            ++$i => "medical_record",
        );
        if(Gate::allows('surgeries.update'))
            $columns += array(++$i => 'surgery_id');
        if(Gate::allows('surgeries.delete'))
            $columns += array(++$i => 'surgery_id');
        $columns += array(
            ++$i => 'head_surgeon_name',
            ++$i => 'procedure_name',
            ++$i => 'procedure_name',
            ++$i => 'status_name',
            ++$i => 'scheduling',
        );

        $totalData = Surgery::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
            $surgeries = Surgeries::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        else{
            $search = $request->input('search.value');
            $surgeries = Surgeries::where('patient_name', 'ilike', '%'.$search.'%')
                ->orWhere('medical_record', 'ilike', '%'.$search.'%')
                ->orWhere('head_surgeon_name', 'ilike', '%'.$search.'%')
                ->orWhere('status_name', 'ilike', '%'.$search.'%')
                ->orWhere('scheduling', 'ilike', '%'.$search.'%')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Surgeries::where('patient_name', 'ilike', '%'.$search.'%')
                    ->orWhere('medical_record', 'ilike', '%'.$search.'%')
                    ->orWhere('head_surgeon_name', 'ilike', '%'.$search.'%')
                    ->orWhere('status_name', 'ilike', '%'.$search.'%')
                    ->orWhere('scheduling', 'ilike', '%'.$search.'%')
                ->count();
        }
        $data = array();
        if(!empty($surgeries)){
            foreach ($surgeries as $surgery){
                $edit = route('surgeries.edit', $surgery->surgery_id);
                $token = csrf_token();

                $nestedData['Paciente'] = $surgery->patient_name;
                $nestedData['Prontuário'] = $surgery->medical_record;
                if (Gate::allows('surgeries.edit'))
                    $nestedData['Editar'] = "<a href='{$edit}'>
                                                            <button class='btn btn-primary btn-sm' 
                                                                    data-toggle='tooltip'
                                                                    title='Editar cirurgia'
                                                                    data-placement='top'>
                                                                <i class='fa fa-edit'></i>
                                                            </button>
                                                       </a>";
                if (Gate::allows('surgeries.delete'))
                    $nestedData['Excluir'] = "&emsp;<button class='btn btn-danger btn-sm delete'
                                                                data-placement='top'
                                                                data-toggle='tooltip'
                                                                data-route='surgeries'
                                                                data-type='usuário'
                                                                data-name='{$surgery->name}'
                                                                data-gender='o'
                                                                title='Remover esta cirurgia' 
                                                                name='delete' data-id='{$surgery->id}'
                                                                type='button' id='delete{$surgery->id}'>
                                                            <i class='fa fa-trash'></i>
                                                        </button>";
                $nestedData['Médico principal'] = $surgery->head_surgeon_name;
                $nestedData['Procedimento'] = $surgery->procedure_name;
                $nestedData['Status'] = $surgery->status_name;
                $nestedData['Agendamento'] = $surgery->scheduling != null? $surgery->scheduling : 'Não agendada.';

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
