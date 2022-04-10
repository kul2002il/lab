<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    /**
     * Авторизовать пользователя следует при помощи UserPolicy и middleware
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
