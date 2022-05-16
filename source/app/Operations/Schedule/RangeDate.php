<?php
namespace App\Operations\Schedule;

use DateTime;

class RangeDate
{
    private DateTime $start;
    private DateTime $end;

    public function __construct(
        DateTime $start,
        DateTime $end
    ) {
        $this->start = $start;
        $this->end = $end;
        $this->checkStartEndDate();
    }

    public static function createFromStrings(
        string $start_date,
        string $end_date
    ): self {
        return new RangeDate(
            new \DateTime($start_date),
            new \DateTime($end_date)
        );
    }

    public function getStart(): DateTime
    {
        return clone $this->start;
    }

    public function getEnd(): DateTime
    {
        return clone $this->end;
    }

    public function setStart(DateTime $start): void
    {
        $this->start = $start;
        $this->checkStartEndDate();
    }

    public function setEnd(DateTime $end): void
    {
        $this->end = $end;
        $this->checkStartEndDate();
    }

    private function checkStartEndDate(): void
    {
        if ($this->start > $this->end)
        {
            $this->exceptionStartAfterEnd();
        }
    }

    private function exceptionStartAfterEnd(): void
    {
        $startStr = $this->start->format('Y-n-j G:i:s');
        $endStr = $this->end->format('Y-n-j G:i:s');
        throw new \Exception(
            "Start ($startStr) must be before end ($endStr)."
        );
    }

    public function intersection(self $range): self
    {
        $start = max($this->start, $range->start);
        $end = min($this->end, $range->end);
        return new self($start, $end);
    }

    public function iterator(): \Generator
    {
        for (
            $date = clone $this->start;
            $date <= $this->end;
            $date->add(new \DateInterval('P1D'))
        ) {
            yield $date;
        }
    }
}
