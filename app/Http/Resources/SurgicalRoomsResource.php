<?php

namespace HUAC\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SurgicalRoomsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'color'      => $this->color,
            'available'  => $this->available,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
