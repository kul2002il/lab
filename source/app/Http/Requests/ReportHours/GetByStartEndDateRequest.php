<?php

namespace App\Http\Requests\ReportHours;

use App\Http\Requests\BaseRequest;

class GetByStartEndDateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => ['date', 'nullable'],
            'end_date' => ['date', 'nullable'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'start_date' => [
                'description' => 'Дата начала периода отчёта. Включительно.',
                'example' => '2001-10-08',
            ],
            'end_date' => [
                'description' => 'Дата конца периода отчёта. Включительно.',
                'example' => '2016-10-08',
            ],
        ];
    }
}
