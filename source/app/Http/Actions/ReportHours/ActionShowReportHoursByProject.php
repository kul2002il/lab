<?php

namespace App\Http\Actions\ReportHours;

use App\Http\Requests\ReportHours\GetByStartEndDateRequest;
use App\Http\Resources\ReportHours\ReportHoursWithProjectCollection;
use App\Models\ReportHours;

class ActionShowReportHoursByProject
{
    /**
     * Report hours by project
     *
     * Getting a report on hours from employees ordered by project
     * for a certain period of days.
     *
     * If several employees worked on one project, then several records
     * are created in the `reports` array with the same value of the fields
     * related to the project.
     *
     * @group Report hours
     */
    function __invoke(GetByStartEndDateRequest $request) {
        $report = new ReportHours(
            $request->validated('start_date'),
            $request->validated('end_date')
        );
        return new ReportHoursWithProjectCollection($report->reportByProject());
    }
}
