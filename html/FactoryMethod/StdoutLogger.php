<?php declare(strict_types=1);

namespace DesignPattern\FactoryMethod;

class StdoutLogger implements Logger
{
    public function log(string $message)
    {
        echo $message;
    }
}