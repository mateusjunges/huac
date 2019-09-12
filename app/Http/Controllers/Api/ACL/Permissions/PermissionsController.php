<?php

namespace HUAC\Http\Controllers\Api\ACL\Permissions;


use HUAC\Http\Resources\PermissionsResource;
use Junges\ACL\Http\Models\Permission;

class PermissionsController
{
    public function __invoke()
    {
        return PermissionsResource::collection(
            Permission::all()
        );
    }
}
