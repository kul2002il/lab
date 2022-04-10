<?php

namespace App\Http\Actions\Token\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TokenCollection extends ResourceCollection
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
            'tokens' => UserTokenResource::collection($this->collection),
        ];
    }
}
