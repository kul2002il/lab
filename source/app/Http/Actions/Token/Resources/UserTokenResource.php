<?php

namespace App\Http\Actions\Token\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTokenResource extends JsonResource
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
            'name' => $this->name,
            'abilities' => $this->abilities,
            'last_used_at' => $this->last_used_at,
        ];
    }
}
