<?php
namespace App\Operations\Schedule\Modifiers;

use App\Operations\Schedule\Modifiers\Modifier;

class Real implements Modifier
{
    private string $info;

    public function __construct(string $info)
    {
        $this->info = $info;
    }

    public function getInfo(): string
    {
        return $this->info;
    }

    public function getStatus(): ?string
    {
        return 'holiday';
    }

    public function getType(): string
    {
        return 'Real';
    }
}
