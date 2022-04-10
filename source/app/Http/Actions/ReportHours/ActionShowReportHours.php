<?php

namespace App\Http\Actions\ReportHours;

use App\Http\Requests\ReportHours\GetByStartEndDateRequest;
use App\Http\Resources\ReportHours\ShortReportHoursCollection;
use App\Models\ReportHours;

class ActionShowReportHours
{
    /**
     * Короткий отчёт
     *
     * Получение короткого отчёта о часах сотрудников за определённый период
     * дней.
     *
     * Простая сумма времени, указанного в блогах, сгруппированные по
     * сотрудникам.
     *
     * @group Отчёт по часам
     */
    function __invoke(GetByStartEndDateRequest $request) {
        $report = new ReportHours(
            $request->validated('start_date'),
            $request->validated('end_date')
        );
        return new ShortReportHoursCollection($report->reportShort());
    }
}
