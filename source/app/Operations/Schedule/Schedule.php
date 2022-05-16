<?php
namespace App\Operations\Schedule;

use App\Operations\Schedule\RangeDaysModifier;

class Schedule
{
    private $range;
    private $days = [];

    public function __construct(RangeDate $range)
    {
        $this->range = $range;
        $this->initDays();
    }

    private function initDays()
    {
        foreach ($this->range->iterator() as $day)
        {
            $this->days[$day->format('Y-m-d')] = new Day($day);
        }
    }

    public function applyRangeModifier(RangeDaysModifier $rangeModifier)
    {
        $range = $rangeModifier->range->intersection($this->range);
        foreach ($range->iterator() as $day)
        {
            $this->days[$day->format('Y-m-d')]
                ->addModifier($rangeModifier->modifier);
        }
    }

    public function getDays()
    {
        return $this->days;
    }

    public function clone(): self
    {
        $newSchedule = new self($this->range);
        $newSchedule->days = array_map(fn($day)=>clone $day, $this->days);
        return $newSchedule;
    }
}
