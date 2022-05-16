<?php

namespace App\Http\Actions\ReportHours;

use App\Http\Requests\ReportHours\GetByStartEndDateRequest;
use App\Http\Resources\ReportHours\ShortReportHoursCollection;
use App\Models\ReportHours;

class ActionShowReportHours
{
    /**
     * Show report
     *
     * Getting a short report on hours from employees for a certain period
     * of days.
     *
     * @group Report hours
     */
    function __invoke(GetByStartEndDateRequest $request) {
        $report = new ReportHours(
            $request->validated('start_date'),
            $request->validated('end_date')
        );
        return new ShortReportHoursCollection($report->reportShort());
    }
}
