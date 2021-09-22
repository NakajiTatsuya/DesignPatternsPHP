<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example2;

use DesignPattern\Facade\Example2\Item;

class Cart
{
    private array $chooses = [];

    public function getChooses()
    {
        return $this->chooses;
    }
    public function add(Item $item)
    {
        $this->chooses[] =  $item;
    }
}