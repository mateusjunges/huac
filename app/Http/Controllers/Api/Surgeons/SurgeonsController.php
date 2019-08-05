<?php

namespace HUAC\Http\Controllers\Api\Surgeons;

use HUAC\Http\Resources\SurgeonsResource;
use HUAC\Models\Surgeon;
use Illuminate\Http\Request;

class SurgeonsController
{
    /**
     * Return all the stored surgeons.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all()
    {
        return SurgeonsResource::collection(
            Surgeon::all()
        );
    }

    /**
     * Return the specified surgeon.
     * @param $id
     * @return SurgeonsResource
     */
    public function find($id)
    {
        return new SurgeonsResource(
            Surgeon::find($id)
        );
    }
}
