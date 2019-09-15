<?php

namespace HUAC\Http\Controllers\Api\Patients;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class PatientsColumnsController
{
    public function __invoke(Request $request)
    {
        if (!$request->ajax())
            return response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        $i = -1;

        $columns = array();
        $columns += array(++$i => 'Nome');
        if (Gate::allows('patients.update'))
            $columns += array(++$i => 'Editar');
        if (Gate::allows('patients.delete'))
            $columns += array(++$i => 'Remover');
        if (Gate::allows('patients.view-surgeries'))
            $columns += array(++$i => 'Ver cirurgias');
        $columns += array(
            ++$i => 'Prontuário',
            ++$i => 'Gênero',
            ++$i => 'Nome da mãe',
        );


        return response(collect($columns)->map(function ($item){
            if($item == 'Editar'
                || $item == 'Remover')
                return ['data' => $item, 'searchable' => false, 'orderable' => false];
            return ['data' => $item];
        })->toJson(JSON_UNESCAPED_UNICODE));
    }
}
