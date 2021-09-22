<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example2;


class TotalFee
{
    private int $total = 0;

    public function add($price)
    {
        $this->total = $this->total + $price;
    }

    public function getTotal(): string
    {
        return sprintf('\\%s-', (int)($this->total));
    }

    public function getPayment(): int
    {
        return (int)($this->total);
    }
}