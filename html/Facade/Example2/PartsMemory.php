<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example2;

use DesignPattern\Facade\Example2\Item;

class PartsMemory
{
    private array $items = [];

    public function __construct()
    {
        $this->items = [
            1 => new Item(1, '4MB', 10000),
            2 => new Item(2, '8MB', 20000),
            3 => new Item(3, '16MB', 30000),
        ];
    }

    public function getItem($id)
    {
        return $this->items[$id];
    }
}