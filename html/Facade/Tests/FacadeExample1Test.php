<?php declare(strict_types=1);

namespace DesignPattern\Facade\Tests;

use DesignPattern\Facade\Example1\Bios;
use DesignPattern\Facade\Example1\Facade;
use DesignPattern\Facade\Example1\OperatingSystem;
use PHPUnit\Framework\TestCase;

class FacadeExample1Test extends TestCase
{
    public function testComputerOn()
    {
        $os = $this->createMock(OperatingSystem::class);
        $os->method('getName')
            ->will($this->returnValue('Linux'));
        
        $bios = $this->createMock(Bios::class);
        $bios->method('launch')
            ->with($os);

        /** @noinspection PhpParamsInspection */
        $facade = new Facade($bios, $os);
        $facade->turnOn();

        $this->assertSame('Linux', $os->getName());
    }
}
