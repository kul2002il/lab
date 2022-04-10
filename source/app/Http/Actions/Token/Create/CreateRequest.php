<?php

namespace App\Http\Actions\Token\Create;

use App\Http\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:Laravel\Sanctum\PersonalAccessToken,name',
            ],
        ];
    }

    public function bodyParameters()
    {
        return [
            'name' => [
                'description' => 'Token name',
                'example' => 'report-service',
            ],
        ];
    }
}
