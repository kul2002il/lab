<?php

namespace App\Http\Actions\Sсhedule;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficialDayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'status' => $this->resource->getStatus(),
            'info' => $this->resource->getInfo(),
        ];
    }
}
