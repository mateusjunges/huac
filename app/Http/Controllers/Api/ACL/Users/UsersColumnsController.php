<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;

use Gate;
use HUAC\Http\Controllers\Controller;

class UsersColumnsController extends Controller
{
    public function __invoke()
    {
        $i = -1;

        $columns = array();
        $columns += array(++$i => 'Nome', ++$i => 'Email', ++$i => 'Username');
        if(Gate::allows('users.edit'))
            $columns += array(++$i => 'Editar');
        if(Gate::allows('users.delete'))
            $columns += array(++$i => 'Remover');
        if (Gate::allows('users.assign-group'))
            $columns += array(++$i => 'Atribuir grupo');
        if (Gate::allows('users.assign-permissions'))
            $columns += array(++$i => 'Atribuir permissão');
        if(Gate::allows('users.view-permissions'))
            $columns += array(++$i => 'Ver Permissões');
        if(Gate::allows('users.viewGroups'))
            $columns += array(++$i => 'Ver grupos');

        return response(collect($columns)->map(function ($item){
            if($item == 'Editar'
                || $item == 'Remover'
                || $item == 'Ver Permissões'
                || $item == 'Ver grupos'
                || $item == 'Atribuir grupo'
                || $item == 'Atribuir permissão')
                return ['data' => $item, 'searchable' => false, 'orderable' => false];
            return ['data' => $item];
        })->toJson(JSON_UNESCAPED_UNICODE));

    }
}
