<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example1;

class Facade
{
    public function __construct(private Bios $bios, private OperatingSystem $os)
    {
    }

    /**
     * 電源起動をしたければ、クライアント側はこれを呼ぶだけで良い
     */
    public function turnOn()
    {
        $this->bios->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launch($this->os);
    }

    /**
     * 電源OFFにしたければ、クライアント側はこれを呼ぶだけで良い
     */
    public function turnOff()
    {
        $this->os->halt();
        $this->bios->powerDown();
    }
}