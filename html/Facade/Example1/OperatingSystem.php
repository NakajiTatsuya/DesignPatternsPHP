<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example1;

interface OperatingSystem
{
    public function halt();

    public function getName(): string;
}