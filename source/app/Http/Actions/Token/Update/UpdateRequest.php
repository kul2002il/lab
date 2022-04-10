<?php

namespace App\Http\Actions\Token\Update;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['unique:Laravel\Sanctum\PersonalAccessToken,name'],
            'abilities' => ['array'],
            'abilities.*' => ['string'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'name' => [
                'description' => 'Token name',
                'example' => 'report-service',
            ],
            'abilities' => [
                'description' => 'Token rules',
                'example' => ['*'],
            ],
        ];
    }
}
