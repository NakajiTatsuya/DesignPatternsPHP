<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example2;

class Item
{
    public function __construct(private int $id, private string $name, private int $price)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function display()
    {
        echo sprintf('%s \\%s<br>', $this->getName(), (int)$this->getPrice());
    }
}