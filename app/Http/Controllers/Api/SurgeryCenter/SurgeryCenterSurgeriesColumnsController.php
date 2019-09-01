<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SurgeryCenterSurgeriesColumnsController
{

    public function __invoke(Request $request)
    {
        if (!$request->ajax())
            return response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        $i = -1;

        $columns = array();
        $columns += array(++$i => 'Paciente', ++$i => 'Prontuário');
        if (Gate::allows('surgeries.update'))
            $columns += array(++$i => 'Editar');
        if (Gate::allows('surgery-center.confirm-materials'))
            $columns += array(++$i => 'Confirmar');
        if (Gate::allows('surgery-center.deny-materials'))
            $columns += array(++$i => 'Negar');
        $columns += array(
            ++$i => 'Materiais',
            ++$i => 'Procedimento',
            ++$i => 'Status',
            ++$i => 'Agendamento',
        );


        return response(collect($columns)->map(function ($item){
            if($item == 'Editar')
                return ['data' => $item, 'searchable' => false, 'orderable' => false];
            return ['data' => $item];
        })->toJson(JSON_UNESCAPED_UNICODE));
    }
}
