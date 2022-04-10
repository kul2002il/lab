<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseResource extends JsonResource
{
    public function code(int $code)
    {
        return $this->response()->setStatusCode($code);
    }
}
