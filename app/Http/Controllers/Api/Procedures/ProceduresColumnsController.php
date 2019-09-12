<?php

namespace HUAC\Http\Controllers\Api\Procedures;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProceduresColumnsController {

    public function __invoke(Request $request)
    {
        if (!$request->ajax())
            return response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        $i = -1;

        $columns = array();
        $columns += array(++$i => 'Nome');
        if(Gate::allows('procedures.update'))
            $columns += array(++$i => 'Editar');
        if(Gate::allows('procedures.delete'))
            $columns += array(++$i => 'Remover');
        $columns += array(
            ++$i => 'Código SUS',
        );


        return response(collect($columns)->map(function ($item){
            if($item == 'Editar'
                || $item == 'Remover')
                return ['data' => $item, 'searchable' => false, 'orderable' => false];
            return ['data' => $item];
        })->toJson(JSON_UNESCAPED_UNICODE));
    }
}
