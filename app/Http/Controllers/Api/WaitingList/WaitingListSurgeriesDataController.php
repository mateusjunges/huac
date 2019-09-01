<?php

namespace HUAC\Http\Controllers\Api\WaitingList;

use HUAC\Enums\Status;
use HUAC\Models\Surgery;
use HUAC\Models\Views\Surgeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WaitingListSurgeriesDataController
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
                ->where('status_id', Status::WAITING_LIST)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        else{
            $search = $request->input('search.value');
            $surgeries = Surgeries::where([
                ['patient_name', 'ilike', '%'.$search.'%'],
                ['status_id', '=', Status::WAITING_LIST]
            ])
                ->orWhere([
                    ['medical_record', 'ilike', '%'.$search.'%'],
                    ['status_id', '=', Status::WAITING_LIST]
                ])
                ->orWhere([
                    ['head_surgeon_name', 'ilike', '%'.$search.'%'],
                    ['status_id', '=', Status::WAITING_LIST]
                ])
                ->orWhere([
                    ['status_name', 'ilike', '%'.$search.'%'],
                    ['status_id', '=', Status::WAITING_LIST]
                ])
                ->orWhere([
                    ['scheduling', 'ilike', '%'.$search.'%'],
                    ['status_id', '=', Status::WAITING_LIST]
                ])
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Surgeries::where([
                ['patient_name', 'ilike', '%'.$search.'%'],
                ['status_id', '=', Status::WAITING_LIST]
            ])
                ->orWhere([
                    ['medical_record', 'ilike', '%'.$search.'%'],
                    ['status_id', '=', Status::WAITING_LIST]
                ])
                ->orWhere([
                    ['head_surgeon_name', 'ilike', '%'.$search.'%'],
                    ['status_id', '=', Status::WAITING_LIST]
                ])
                ->orWhere([
                    ['status_name', 'ilike', '%'.$search.'%'],
                    ['status_id', '=', Status::WAITING_LIST]
                ])
                ->orWhere([
                    ['scheduling', 'ilike', '%'.$search.'%'],
                    ['status_id', '=', Status::WAITING_LIST]
                ])
                ->count();
        }
        $data = array();
        if(!empty($surgeries)){
            foreach ($surgeries as $surgery){
                $edit = route('waiting-list.edit', $surgery->surgery_id);
                $token = csrf_token();

                $nestedData['Paciente'] = $surgery->patient_name;
                $nestedData['Prontuário'] = $surgery->medical_record;
                if (Gate::allows('waiting-list.update'))
                    $nestedData['Editar'] = "<a href='{$edit}'>
                                                            <button class='btn btn-primary btn-sm' 
                                                                    data-toggle='tooltip'
                                                                    title='Editar cirurgia'
                                                                    data-placement='top'>
                                                                <i class='fa fa-edit'></i>
                                                            </button>
                                                       </a>";
                if (Gate::allows('waiting-list.delete'))
                    $nestedData['Excluir'] = "<button class='btn btn-danger btn-sm delete'
                                                                data-placement='top'
                                                                data-toggle='tooltip'
                                                                data-route='waiting-list'
                                                                data-type='cirurgia do paciente'
                                                                data-name='{$surgery->patient_name}'
                                                                data-gender='a'
                                                                value='{$token}'
                                                                title='Remover esta cirurgia' 
                                                                name='delete' 
                                                                data-id='{$surgery->surgery_id}'
                                                                type='button' 
                                                                id='delete{$surgery->surgery_id}'>
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
