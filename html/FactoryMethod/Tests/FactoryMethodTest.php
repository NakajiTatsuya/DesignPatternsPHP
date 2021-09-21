<?php declare(strict_types=1);

namespace DesignPattern\FactoryMethod\Tests;

use DesignPattern\FactoryMethod\FileLogger;
use DesignPattern\FactoryMethod\FileLoggerFactory;
use DesignPattern\FactoryMethod\StdoutLogger;
use DesignPattern\FactoryMethod\StdoutLoggerFactory;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    public function testCanCreateStdoutLogging()
    {
        $loggerFactory = new StdoutLoggerFactory();
        $logger = $loggerFactory->createLogger();

        $this->assertInstanceOf(StdoutLogger::class, $logger);
    }

    public function testCanCreateFileLogging()
    {
        $loggerFactory = new FileLoggerFactory(sys_get_temp_dir());
        $logger = $loggerFactory->createLogger();

        $this->assertInstanceOf(FileLogger::class, $logger);
    }
}