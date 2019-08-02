<?php

namespace HUAC\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProceduresResource extends JsonResource
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
            'id'       => $this->id,
            'sus_code' => $this->sus_code,
            'name'     => $this->name,
        ];
    }
}
