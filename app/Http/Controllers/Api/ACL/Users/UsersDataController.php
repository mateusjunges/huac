<?php

namespace HUAC\Http\Controllers\Api\ACL\Users;

use Gate;
use HUAC\Models\User;
use Illuminate\Http\Request;

class UsersDataController
{
    /**
     * Return the users to fill the users datatable.
     * @param Request $request
     * @return false|string
     */
    public function __invoke(Request $request)
    {
        $i = -1;
        $columns = array();
        if(Gate::allows('users.update'))
            $columns += array(++$i => 'id');
        if(Gate::allows('users.delete'))
            $columns += array(++$i => 'id');
        if(Gate::allows('users.viewPermissions'))
            $columns += array(++$i => 'id');
        if(Gate::allows('users.updateUserPermissions'))
            $columns += array(++$i => 'id');
        if(Gate::allows('users.viewGroups'))
            $columns += array(++$i => 'id');
        if(Gate::allows('groups.addUser'))
            $columns += array(++$i => 'id');
        $columns += array(++$i => 'name', ++$i => 'username', ++$i => 'email');

        $totalData = User::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
            $users = User::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        else{
            $search = $request->input('search.value');
            $users = User::where('name', 'ilike', '%'.$search.'%')
                ->orWhere('username', 'ilike', '%'.$search.'%')
                ->orWhere('email', 'ilike', '%'.$search.'%')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = User::where('name', 'ilike', '%'.$search.'%')
                ->orWhere('username', 'ilike', '%'.$search.'%')
                ->orWhere('email', 'ilike', '%'.$search.'%')
                ->count();
        }
        $data = array();
        if(!empty($users)){
            foreach ($users as $user){
                $edit = route('users.edit', $user->id);
                $userGroups = '';
                $userPermissions = 'afasdfadsfdsaf  ';
                $token = csrf_token();

                $nestedData['Nome'] = $user->name;
                $nestedData['Username'] = $user->username;
                $nestedData['Email'] = $user->email;
                if (Gate::allows('users.edit'))
                    $nestedData['Editar'] = "<a href='{$edit}'>
                                                            <button class='btn btn-primary btn-sm' 
                                                                    data-toggle='tooltip'
                                                                    title='Editar usuário'
                                                                    data-placement='top'>
                                                                <i class='fa fa-edit'></i>
                                                            </button>
                                                       </a>";
                if (Gate::allows('users.remove'))
                    $nestedData['Remover'] = "&emsp;<button class='btn btn-danger btn-sm delete'
                                                                data-placement='top'
                                                                data-toggle='tooltip'
                                                                title='Remover este usuário' 
                                                                name='delete' data-id='{$user->id}'
                                                                type='button' id='delete{$user->id}'>
                                                            <i class='fa fa-trash'></i>
                                                        </button>";
                if (Gate::allows('users.view-permissions'))
                    $nestedData['Ver Permissões'] = "&emsp;<a href='{$userPermissions}'>
                                                                  <button class='btn btn-success btn-sm viewPermissions'
                                                                          data-toggle='tooltip'
                                                                          data-placement='top'
                                                                          title='Ver permissões do usuário'
                                                                          data-id='{$user->id}}' value='{$token}'
                                                                          type='button' id='showpermissions{$user->id}'>
                                                                          <i class='fa fa-check'></i>                                                                    
                                                                  </button>
                                                              </a>";
                if (Gate::allows('users.view-groups'))
                    $nestedData['Ver grupos'] = "<a href='{$userGroups}'>
                                                                        <button class='btn btn-sm btn-info viewGroups'
                                                                                data-toggle='tooltip'
                                                                                data-placement='top'
                                                                                title='Ver os grupos que este usuário pertence'
                                                                                data-id='{$user->id}' value='{$token}'
                                                                                type='button' id='viewGroups{$user->id}'>
                                                                            <i class='fa fa-tags'></i>        
                                                                        </button>  
                                                                  </a>";
                if (Gate::allows('user.assign-group'))
                    $nestedData['Atribuir grupo'] = "&emsp;<button class='btn btn-sm btn-default assignGroup'
                                                                          data-toggle='tooltip'
                                                                          data-placement='top'
                                                                          title='Atribuir este usuário a um grupo'  
                                                                          data-id='{$user->id}' type='button'
                                                                          id='user{$user->id}'>
                                                                        <i class='fa fa-plus'></i>      
                                                                  </button>";
                if (Gate::allows('users.assign-permission'))
                    $nestedData['Atribuir permissão'] = "<button class='btn btn-sm btn-default assignPermission'
                                                                          data-placement='top'
                                                                          data-toggle='tooltip'
                                                                          title='Atribuir permissões a este usuário'  
                                                                          data-id='{$user->id}' type='button'
                                                                          id='user{$user->id}'>
                                                                        <i class='fa fa-plus'></i>      
                                                          </button>";

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
