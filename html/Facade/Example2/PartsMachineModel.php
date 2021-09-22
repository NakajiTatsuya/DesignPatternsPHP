<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example2;

use DesignPattern\Facade\Example2\Item;

class PartsMachineModel
{
    private array $items;

    public function __construct()
    {
        $this->items = [
            1 => new Item(1, 'ミニタワー', 10000),
            2 => new Item(2, 'ミドルタワー', 20000),
            3 => new Item(3, 'フルタワー', 30000),
        ];
    }

    public function getItem(int $id): Item
    {
        return $this->items[$id];
    }
}