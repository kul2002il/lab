<?php
namespace App\Operations\Schedule;

use App\Operations\Schedule\Modifiers\Modifier;
use App\Operations\Schedule\Modifiers\ManagerModifier;

class RangeDaysModifier
{
    public RangeDate $range;

    public Modifier $modifier;

    static function create(
        string $start_date,
        string $end_date,
        string $type,
        string $info
    ): self
    {
        $rdm = new self();
        $rdm->range = RangeDate::createFromStrings($start_date, $end_date);
        $manager = new ManagerModifier();
        $rdm->modifier = $manager->createModifierByType($type, $info);
        return $rdm;
    }
}
