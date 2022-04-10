<?php

namespace App\Http\Requests;

class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nick' => ['required'],
            'password' => ['required'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'nick' => [
                'description' => 'User nick',
                'example' => 'testuser',
            ],
            'password' => [
                'description' => 'User password',
                'example' => 'password',
            ],
        ];
    }
}
