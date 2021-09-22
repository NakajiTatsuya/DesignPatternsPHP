<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example2;

use DesignPattern\Facade\Example2\Item;

class PartsHdd
{
    private array $items;

    public function __construct()
    {
        $this->items = [
            1 => new Item(1, 'SSD 128GB', 10000),
            2 => new Item(2, 'SSD 256GB', 20000),
            3 => new Item(3, 'SSD 500GB', 30000),
        ];
    }
    public function getItem(int $id)
    {
        return $this->items[$id];
    }
}