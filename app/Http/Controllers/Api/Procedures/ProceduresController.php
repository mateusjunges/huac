<?php

namespace HUAC\Http\Controllers\Api\Procedures;

use HUAC\Http\Resources\ProceduresResource;
use HUAC\Models\Procedure;

class ProceduresController
{
    /**
     * Return all the stored procedures.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all()
    {
        return ProceduresResource::collection(
            Procedure::all()
        );
    }

    /**
     * Return the specified procedure
     * @param $id
     * @return ProceduresResource
     */
    public function find($id)
    {
        return new ProceduresResource(
            Procedure::find($id)
        );
    }
}
