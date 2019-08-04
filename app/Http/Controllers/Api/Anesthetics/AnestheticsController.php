<?php

namespace HUAC\Http\Controllers\Api\Anesthetics;

use HUAC\Http\Resources\AnestheticsResource;
use HUAC\Models\Anesthesia;

class AnestheticsController
{
    /**
     * Return all stored anesthetics.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all()
    {
        return AnestheticsResource::collection(
            Anesthesia::all()
        );
    }

    /**Return the specified anesthesia.
     * @param $id
     * @return AnestheticsResource
     */
    public function find($id)
    {
        return new AnestheticsResource(
            Anesthesia::find($id)
        );
    }
}
