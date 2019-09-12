<?php

namespace HUAC\Http\Controllers\Api\CME;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class CMESurgeriesColumnsController
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
        if (Gate::allows('cme.confirm-materials'))
            $columns += array(++$i => 'Confirmar');
        if (Gate::allows('cme.deny-materials'))
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
