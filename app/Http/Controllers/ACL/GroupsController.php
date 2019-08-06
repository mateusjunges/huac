<?php

namespace HUAC\Http\Controllers\ACL;

use HUAC\Http\Requests\GroupRequest;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Controller;
use Junges\ACL\Http\Models\Group;
use Junges\ACL\Http\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('ACL.groups.index')->with([
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('ACL.groups.create')->with([
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
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
     * Display the specified resource.
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit($group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        try{
            $group->delete();

            return response()->json([
                'code' => Response::HTTP_OK,
                'icon' => 'success',
                'title' => trans('huac.success'),
                'text'  => trans('huac.group_removed_successfully'),
                'timer' => 5000,
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'icon' => 'success',
                'title' => trans('huac.error'),
                'text'  => trans('huac.somenthing_went_wrong'),
                'timer' => 5000,
            ]);
        }
    }
}
