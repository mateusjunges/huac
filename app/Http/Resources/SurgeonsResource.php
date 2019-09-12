<?php

namespace HUAC\Http\Resources;

use HUAC\Models\Surgeon;
use Illuminate\Http\Resources\Json\JsonResource;

class SurgeonsResource extends JsonResource
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
            'user_id'    => $this->user_id,
            'name'       => Surgeon::name()->first()->name,
            'crm'        => $this->crm,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
