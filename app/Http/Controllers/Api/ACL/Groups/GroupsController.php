<?php

namespace HUAC\Http\Controllers\Api\ACL\Groups;

use HUAC\Http\Resources\GroupsResource;
use Junges\ACL\Http\Models\Group;
use Symfony\Component\HttpFoundation\Response;

class GroupsController
{
    public function all()
    {
        return GroupsResource::collection(
            Group::all()
        );
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
