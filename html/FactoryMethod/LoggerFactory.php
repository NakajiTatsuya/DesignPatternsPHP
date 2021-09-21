<?php declare(strict_types=1);

namespace DesignPattern\FactoryMethod;

interface LoggerFactory
{
    public function createLogger(): Logger;
}