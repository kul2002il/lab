<?php
namespace App\Http\Actions\Sсhedule;

use App\Http\Requests\ReportHours\GetByStartEndDateRequest;
use App\Operations\Schedule\GetterVacationOfficial;
use App\Operations\Schedule\RangeDate;

class ActionScheduleOfficial
{
    public function __invoke(GetByStartEndDateRequest $request)
    {
        $range = RangeDate::createFromStrings(
            $request->validated('start_date'),
            $request->validated('end_date')
        );
        $getter = new GetterVacationOfficial($range);
        $schedule = $getter->schedule;
        return OfficialDayResource::collection($schedule->getDays());
    }
}
