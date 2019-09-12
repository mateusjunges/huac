<?php

namespace HUAC\Http\Controllers\Api\Surgeries;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SurgeriesColumnsController
{
    public function __invoke(Request $request)
    {
        if (!$request->ajax())
            return response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        $i = -1;

        $columns = array();
        $columns += array(++$i => 'Paciente', ++$i => 'Prontuário');
        if(Gate::allows('surgeries.update'))
            $columns += array(++$i => 'Editar');
        if(Gate::allows('surgeries.delete'))
            $columns += array(++$i => 'Excluir');
        $columns += array(
            ++$i => 'Médico principal',
            ++$i => 'Procedimento',
            ++$i => 'Status',
            ++$i => 'Agendamento',
        );


        return response(collect($columns)->map(function ($item){
            if($item == 'Editar'
                || $item == 'Excluir')
                return ['data' => $item, 'searchable' => false, 'orderable' => false];
            return ['data' => $item];
        })->toJson(JSON_UNESCAPED_UNICODE));
    }
}
