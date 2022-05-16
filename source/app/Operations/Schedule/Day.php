<?php
namespace App\Operations\Schedule;

use App\Operations\Schedule\Modifiers\Modifier;
use App\Operations\Schedule\Modifiers\ManagerModifier;

class Day
{
    private \DateTime $date;

    private array $modifiers = [];

    public function __construct(\DateTime $date)
    {
        $this->date = $date;
    }

    public function addModifier(Modifier $modifier)
    {
        $this->modifiers[] = $modifier;
    }

    public function getStatus()
    {
        if(!$this->modifiers)
        {
            return 'work';
        }
        $manager = new ManagerModifier();
        return array_reduce(
            $this->modifiers,
            fn($cary, $item) => $manager->resolveTwoModifier($item, $cary),
        )->getStatus();
    }

    public function getInfo()
    {
        return array_map(fn($mod)=>$mod->getInfo(), $this->modifiers);
    }

    public function getDate()
    {
        return clone $this->date;
    }
}
