<?php
namespace App\Operations\Schedule;

use App\Models\VacationOfficial;

class GetterVacationOfficial
{
    public Schedule $schedule;

    public function __construct(RangeDate $range)
    {
        $this->schedule = new Schedule($range);
        foreach (VacationOfficial::getAllRangeModifiersInRange($range) as $rangeModifier)
        {
            $this->schedule->applyRangeModifier($rangeModifier);
        }
    }
}
