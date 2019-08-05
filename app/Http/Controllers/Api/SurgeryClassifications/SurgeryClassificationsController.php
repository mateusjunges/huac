<?php

namespace HUAC\Http\Controllers\Api\SurgeryClassifications;

use HUAC\Http\Resources\ClassificationResource;
use HUAC\Models\SurgeryClassification;

class SurgeryClassificationsController
{
    /**
     * Return all stored classifications.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all()
    {
        return ClassificationResource::collection(
            SurgeryClassification::all()
        );
    }

    /**
     * Return the specified classification.
     * @param $id
     * @return ClassificationResource
     */
    public function find($id)
    {
        return new ClassificationResource(
            SurgeryClassification::find($id)
        );
    }
}
