<?php

namespace HUAC\Http\Controllers\Api\Patients\Surgeries;

use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientSurgeriesColumnsController
{
    public function __invoke(Request $request)
    {
        if (!$request->ajax())
            return response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        $i = -1;

        $columns = array();
        if (Gate::allows('surgeries.update'))
            $columns += array(++$i => 'Editar');
        if (Gate::allows('surgeries.delete'))
            $columns += array(++$i => 'Remover');
        $columns += array(
            ++$i => 'Médico principal',
            ++$i => 'Procedimento',
            ++$i => 'Status',
            ++$i => 'Agendamento'
        );


        return response(collect($columns)->map(function ($item){
            if($item == 'Editar'
                || $item == 'Remover')
                return ['data' => $item, 'searchable' => false, 'orderable' => false];
            return ['data' => $item];
        })->toJson(JSON_UNESCAPED_UNICODE));
    }
}
