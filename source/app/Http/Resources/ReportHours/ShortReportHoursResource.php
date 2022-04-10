<?php

namespace App\Http\Resources\ReportHours;

use Illuminate\Http\Resources\Json\JsonResource;

class ShortReportHoursResource extends JsonResource
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
            'nick' => $this->resource->nick,
            'name' => $this->resource->name,
            'company' => $this->resource->company,
            'total_hours' => $this->resource->total_hours,
        ];
    }
}
