<?php

namespace App\Http\Resources\ReportHours;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShortReportHoursCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'count_reports' => count($this->collection),
            'reports' => ShortReportHoursResource::collection($this->collection),
        ];
    }
}
