<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example2;

use DesignPattern\Facade\Example2\Item;

class PartsCpu
{
    private array $items;

    public function __construct()
    {
        $this->items = [
            1 => new Item(1, 'Core i3 プロセッサー', 10000),
            2 => new Item(1, 'Core i5 プロセッサー', 20000),
            3 => new Item(1, 'Core i7 プロセッサー', 30000), 
        ];
    }
    
    public function getItem(int $id)
    {
        return $this->items[$id];
    }
}