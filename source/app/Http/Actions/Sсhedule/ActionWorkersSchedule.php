<?php
namespace App\Http\Actions\Sсhedule;

use App\Http\Requests\ReportHours\GetByStartEndDateRequest;
use App\Operations\Schedule\RangeDate;
use App\Operations\Schedule\GetterWorkerVacation;

class ActionWorkersSchedule
{
    public function __invoke(GetByStartEndDateRequest $request)
    {
        $range = RangeDate::createFromStrings(
            $request->validated('start_date'),
            $request->validated('end_date')
        );
        $getter = new GetterWorkerVacation($range);
        return $getter->getScheduleWithWorkersHours();
    }
}
