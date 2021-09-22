<?php declare(strict_types=1);

namespace DesignPattern\Facade\Example2;

use DesignPattern\Facade\Example2\Item;

use DesignPattern\Facade\Example2\PartsMachineModel;
use DesignPattern\Facade\Example2\PartsCpu;
use DesignPattern\Facade\Example2\PartsHdd;
use DesignPattern\Facade\Example2\PartsMemory;
use DesignPattern\Facade\Example2\TotalFee;
use DesignPattern\Facade\Example2\Cart;

class BtoFacade
{
    public function __construct(
        private PartsMachineModel $machine_model,
        private PartsCpu $cpu,
        private PartsMemory $memory,
        private PartsHdd $hdd,
        private TotalFee $total_fee,
        private Cart $cart
    ) {

        $this->machine_model = new PartsMachineModel();
        $this->cpu = new PartsCpu();
        $this->memory = new PartsMemory();
        $this->hdd = new PartsHdd();
        $this->total_fee = new TotalFee();
        $this->cart = new Cart();
    }


    public function chooseModel(int $id)
    {
        $item = $this->machine_model->getItem($id);
        $this->cart->add($item);
        $this->total_fee->add($item->getPrice());
    }
    public function chooseCpu(int $id)
    {
        $item = $this->cpu->getItem($id);
        $this->cart->add($item);
        $this->total_fee->add($item->getPrice());
    }
    public function chooseMemory(int $id)
    {
        $item = $this->memory->getItem($id);
        $this->cart->add($item);
        $this->total_fee->add($item->getPrice());
    }
    public function chooseHdd(int $id)
    {
        $item = $this->hdd->getItem($id);
        $this->cart->add($item);
        $this->total_fee->add($item->getPrice());
    }

    public function getTotal()
    {
        foreach ($this->choose->getChooses() as $item) {
            $item->display();
        }
        echo sprintf('<br>合計 %s', $this->total_fee->getTotal());
    }

    public function getPayment(): int
    {
        return $this->total_fee->getPayment();
    }
}

