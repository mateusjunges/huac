<?php

namespace HUAC\Http\Controllers\ACL;

use HUAC\Http\Requests\GroupRequest;
use HUAC\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Junges\ACL\Http\Models\Group;
use Junges\ACL\Http\Models\Permission;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Gate::denies('groups.index')){
            $message = array(
              'title' => 'Acesso negado!',
              'text' => 'Você não possui permissão para acessar esta área do sistema!',
              'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        };

        $groups = Group::all();
        return view('ACL.groups.index')->with([
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Gate::denies('groups.create')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $permissions = Permission::all();
        return view('ACL.groups.create')->with([
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupRequest  $request
     * @return Response
     */
    public function store(GroupRequest $request)
    {
        if (Gate::denies('groups.create')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $group = Group::create($request->except('permissions'));

        collect($request->input('permissions'))->map(function ($permission) use ($group) {
            $group->assignPermissions($permission);
        });

        $message = array(
            'type'  => 'success',
            'title' => trans('huac.success'),
            'text'  => trans('huac.group_created_successfully'),
        );

        session()->flash('message', $message);

        return redirect()->route('groups.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Group $group
     * @return Response
     */
    public function edit(Group $group)
    {
        if (Gate::denies('groups.update')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }
        $groupPermissions = $group->permissions()->get();
        $permissions = Permission::all();
        return view('ACL.groups.edit')->with([
            'group' => $group,
            'permissions' => $permissions,
            'groupPermission' => $groupPermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GroupRequest $request
     * @param Group $group
     * @return Response
     */
    public function update(GroupRequest $request, Group $group)
    {
        if (Gate::denies('groups.update')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }
        
        $group = $group->syncPermissions($request->permissions);

        $message = array(
            'title' => trans('huac.success'),
            'text'  => trans('huac.group_updated_successfully'),
            'type'  => 'success'
        );
        session()->flash('message', $message);
        return redirect()->route('groups.index');

    }
}
