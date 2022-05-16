<?php
namespace App\Operations\Schedule;

use App\Models\Vacation;
use App\Models\Worker;
use App\Models\ReportHours;

class GetterWorkerVacation
{
    private RangeDate $range;

    public Schedule $officialSchedule;

    public array $workersSchedule = [];

    public function __construct(RangeDate $range)
    {
        $this->range = $range;
        $this->officialSchedule = (new GetterVacationOfficial($range))
            ->schedule;
        $workersChanges = Vacation::getAllWorkersRangeModifiersInRange($range);
        foreach ($workersChanges as $nick => $rangeModifiers)
        {
            $this->workersSchedule[$nick] = $this->officialSchedule->clone();
            foreach ($rangeModifiers as $rangeModifier)
            {
                $this->workersSchedule[$nick]->applyRangeModifier($rangeModifier);
            }
        }
    }

    public function getWorkersShedule(array $nicks)
    {
        $result = [];
        foreach ($nicks as $nick)
        {
            $result[$nick] = $this->getSheduleForWorker($nick);
        }
        return $result;
    }

    public function getSheduleForWorker(string $nick)
    {
        return $this->workersSchedule[$nick] ?? $this->officialSchedule->clone();
    }

    public function getScheduleWithWorkersHours()
    {
        $schedules = $this->getWorkersShedule(Worker::getNicksEnabledWorkers());
        $schedules = array_map(function($schedule){
            return array_map(function($day){
                return [
                    'status' => $day->getStatus(),
                    'info' => $day->getInfo(),
                ];
            },$schedule->getDays());
        },$schedules);
        $workersHours = new ReportHours(
            $this->range->getStart()->format('Y-m-d'),
            $this->range->getEnd()->format('Y-m-d'),
        );
        foreach ($workersHours->reportByDate() as $record)
        {
            $schedules[$record->nick][$record->date]['total_hours'] = $record->total_hours;
        }
        return $schedules;
    }
}
