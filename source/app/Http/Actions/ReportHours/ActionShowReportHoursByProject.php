<?php

namespace App\Http\Actions\ReportHours;

use App\Http\Requests\ReportHours\GetByStartEndDateRequest;
use App\Http\Resources\ReportHours\ReportHoursWithProjectCollection;
use App\Models\ReportHours;

class ActionShowReportHoursByProject
{
    /**
     * Отчёт по проектам
     *
     * Получение отчёта о часах сотрудников по проектам за определённый период
     * дней.
     *
     * Если на одном проекте работало несколько сотрудников, то создаётся
     * несколько записей в массиве `reports` с одинаковым значением полей,
     * относящихся к проекту.
     *
     * @group Отчёт по часам
     */
    function __invoke(GetByStartEndDateRequest $request) {
        $report = new ReportHours(
            $request->validated('start_date'),
            $request->validated('end_date')
        );
        return new ReportHoursWithProjectCollection($report->reportByProject());
    }
}
