<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example1;

interface Bios
{
    public function execute();

    public function waitForKeyPress();

    public function launch(OperatingSystem $os);

    public function powerDown();
}