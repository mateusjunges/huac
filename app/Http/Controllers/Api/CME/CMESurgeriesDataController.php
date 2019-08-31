<?php

namespace HUAC\Http\Controllers\Api\CME;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use HUAC\Models\Views\CMESurgeriesForConfirmation as Surgery;

class CMESurgeriesDataController
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
            $surgeries = Surgery::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        else{
            $search = $request->input('search.value');
            $surgeries = Surgery::where('patient_name', 'ilike', '%'.$search.'%')
                ->orWhere('medical_record', 'ilike', '%'.$search.'%')
                ->orWhere('status_name', 'ilike', '%'.$search.'%')
                ->orWhere('scheduling', 'ilike', '%'.$search.'%')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Surgery::where('patient_name', 'ilike', '%'.$search.'%')
                ->orWhere('medical_record', 'ilike', '%'.$search.'%')
                ->orWhere('status_name', 'ilike', '%'.$search.'%')
                ->orWhere('scheduling', 'ilike', '%'.$search.'%')
                ->count();
        }
        $data = array();
        if(!empty($surgeries)){
            foreach ($surgeries as $surgery){
                $edit = route('surgeries.update', $surgery->surgery_id);
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
                if (Gate::allows('cme.confirm-materials'))
                    $nestedData['Confirmar'] = "<button class='btn btn-success btn-sm confirm'
                                                                data-placement='top'
                                                                data-toggle='tooltip'
                                                                value='{$token}'
                                                                title='Confirmar os materiais para esta cirurgia'  
                                                                data-id='{$surgery->surgery_id}'
                                                                type='button' 
                                                                id='confirm{$surgery->surgery_id}'>
                                                            <i class='fa fa-check-circle'></i>
                                                        </button>";
                if (Gate::allows('cme.deny-materials'))
                    $nestedData['Negar'] = "<button class='btn btn-danger btn-sm confirm'
                                                                data-placement='top'
                                                                data-toggle='tooltip'
                                                                value='{$token}'
                                                                title='Confirmar os materiais para esta cirurgia'  
                                                                data-id='{$surgery->surgery_id}'
                                                                type='button' 
                                                                id='confirm{$surgery->surgery_id}'>
                                                            <i class='fa fa-times-circle'></i>
                                                        </button>";
                $nestedData['Procedimento'] = $surgery->procedure_name;
                $nestedData['Status'] = $surgery->status_name;
                $nestedData['Materiais'] = $surgery->materials;
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
