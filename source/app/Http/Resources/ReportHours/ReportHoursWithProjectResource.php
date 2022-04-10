<?php

namespace App\Http\Resources\ReportHours;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportHoursWithProjectResource extends JsonResource
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
            'customer_id' => $this->resource->customer_id,
            'customer_name' => $this->resource->customer_name,
            'project_id' => $this->resource->project_id,
            'project_name' => $this->resource->project_name,
            'total_hours' => $this->resource->total_hours,
        ];
    }
}
