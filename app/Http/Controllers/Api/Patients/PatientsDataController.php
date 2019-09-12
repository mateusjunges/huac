<?php

namespace HUAC\Http\Controllers\Api\Patients;

use HUAC\Models\Patient;
use Illuminate\Http\Request;
use Gate;

class PatientsDataController
{
    public function __invoke(Request $request)
    {
        $i = -1;
        $columns = array(
            ++$i => "name",
        );
        if (Gate::allows('patients.update'))
            $columns += array(++$i => 'id');
        if (Gate::allows('patients.delete'))
            $columns += array(++$i => 'id');
        if (Gate::allows('patients.view-surgeries'))
            $columns += array(++$i => 'id');

        $columns += array(
            ++$i => 'medical_record',
            ++$i => 'gender',
            ++$i => 'mother_name',
        );

        $totalData = Patient::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
            $patients = Patient::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        else{
            $search = $request->input('search.value');
            $patients = Patient::where('name', 'ilike', '%'.$search.'%')
                ->orWhere('medical_record', 'ilike', '%'.$search.'%')
                ->orWhere('mother_name', 'ilike', '%'.$search.'%')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Patient::where('name', 'ilike', '%'.$search.'%')
                ->orWhere('medical_record', 'ilike', '%'.$search.'%')
                ->orWhere('mother_name', 'ilike', '%'.$search.'%')
                ->count();
        }
        $data = array();
        if(!empty($patients)){
            foreach ($patients as $patient){
                $edit = route('patients.edit', $patient->id);
                $token = csrf_token();
                $gender = $patient->gender == "M" or $patient->gender == "O" ? 'o' : 'a';
                $view_surgeries = route('patients.surgeries', $patient->id);

                $nestedData['Nome'] = $patient->name;
                if (Gate::allows('patients.update'))
                    $nestedData['Editar'] = "<a href='{$edit}'>
                                                            <button class='btn btn-primary btn-sm' 
                                                                    data-toggle='tooltip'
                                                                    title='Editar paciente'
                                                                    data-placement='top'>
                                                                <i class='fa fa-edit'></i>
                                                            </button>
                                                       </a>";
                if (Gate::allows('patients.delete'))
                    $nestedData['Remover'] = "<button class='btn btn-danger btn-sm delete'
                                                                data-placement='top'
                                                                data-toggle='tooltip'
                                                                data-route='patients'
                                                                data-type='paciente'
                                                                data-name='{$patient->name}'
                                                                data-gender='{$gender}'
                                                                value='{$token}'
                                                                title='Remover este paciente' 
                                                                name='delete' 
                                                                data-id='{$patient->id}'
                                                                type='button' 
                                                                id='delete{$patient->id}'>
                                                            <i class='fa fa-trash'></i>
                                                        </button>";
                if (Gate::allows('patients.view-surgeries'))
                    $nestedData['Ver cirurgias'] = "<a href='{$view_surgeries}'>
                                                        <button class='btn btn-default btn-sm'
                                                                data-placement='top'
                                                                data-toggle='tooltip'
                                                                title='Ver as cirurgias deste paciente' 
                                                                name='delete' 
                                                                data-id='{$patient->id}'
                                                                type='button' 
                                                                id='delete{$patient->id}'>
                                                            <i class='fa fa-eye'></i>
                                                        </button>
                                                    </a>";
                $nestedData['Prontuário'] = $patient->medical_record;
                if ($patient->gender == 'M')
                    $nestedData['Gênero'] = 'Masculino';
                else if ($patient->gender == 'F')
                    $nestedData['Gênero'] = 'Feminino';
                else $nestedData['Gênero'] = 'Outro';

                $nestedData['Nome da mãe'] = $patient->mother_name;

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
