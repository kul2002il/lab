<?php
namespace App\Operations\Schedule\Modifiers;

use App\Operations\Schedule\Modifiers\Modifier;

class Official implements Modifier
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
        return null;
    }

    public function getType(): string
    {
        return 'Official';
    }
}
