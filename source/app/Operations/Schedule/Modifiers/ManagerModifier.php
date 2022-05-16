<?php
namespace App\Operations\Schedule\Modifiers;

class ManagerModifier
{
    private array $dictionaryType = [];

    private function getAllModifierWithPriority(): array
    {
        return [
            Holiday::class => 10,
            Official::class => 20,
            Real::class => 40,
            Work::class => 40,
            Conflict::class => 10000,
        ];
    }

    public function __construct()
    {
        $this->dictionaryType = [];
        foreach ($this->getAllModifierWithPriority() as $class => $priority)
        {
            $modifier = new $class('');
            $this->dictionaryType[$modifier->getType()] = [
                'class' => $class,
                'priority' => $priority
            ];
            unset($modifier);
        }
    }

    public function createModifierByType(string $type, string $info)
    {
        if(!isset($this->dictionaryType[$type]))
        {
            throw new \Exception("Type day $type not found");
        }
        return new $this->dictionaryType[$type]['class']($info);
    }

    public function resolveTwoModifier(Modifier $m1, ?Modifier $m2)
    {
        if(!$m2)
        {
            return $m1;
        }
        $priority1 = $this->dictionaryType[$m1->getType()]['priority'];
        $priority2 = $this->dictionaryType[$m2->getType()]['priority'];
        if($priority1 < $priority2)
        {
            return $m2;
        }
        if($priority1 > $priority2)
        {
            return $m1;
        }
        if($m1->getStatus() !== $m2->getStatus())
        {
            return new Conflict(
                "Conflict {$m1->getType()} and {$m2->getType()}."
            );
        }
    }
}
