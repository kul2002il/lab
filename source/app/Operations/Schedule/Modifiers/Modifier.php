<?php
namespace App\Operations\Schedule\Modifiers;

interface Modifier
{
    public function getStatus(): ?string;
    public function getInfo(): string;
    public function getType(): string;
}
