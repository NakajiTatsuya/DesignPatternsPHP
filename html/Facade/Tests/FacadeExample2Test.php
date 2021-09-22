<?php declare(strict_types=1);

namespace DesignPattern\Facade\Tests;

use DesignPattern\Facade\Example2\PartsMachineModel;
use DesignPattern\Facade\Example2\PartsCpu;
use DesignPattern\Facade\Example2\PartsHdd;
use DesignPattern\Facade\Example2\PartsMemory;
use DesignPattern\Facade\Example2\TotalFee;
use DesignPattern\Facade\Example2\Cart;
use DesignPattern\Facade\Example2\BtoFacade;
use PHPUnit\Framework\TestCase;

class FacadeExample2Test extends TestCase
{
    public function testShoppingCheapest()
    {
        $machine_model = new PartsMachineModel ();
        $cpu = new PartsCpu();
        $memory = new PartsMemory();
        $hdd = new PartsHdd();
        $total_fee = new TotalFee();
        $cart = new Cart();

        $bto = new BtoFacade($machine_model, $cpu, $memory, $hdd, $total_fee, $cart);

        $bto->chooseModel(1);
        $bto->chooseCpu(1);
        $bto->chooseMemory(1);
        $bto->chooseHdd(1);
        
        $payment = $bto->getPayment();

        $this->assertSame(40000, $payment);
    }

    public function testShoppingMostExpensive()
    {
        $machine_model = new PartsMachineModel ();
        $cpu = new PartsCpu();
        $memory = new PartsMemory();
        $hdd = new PartsHdd();
        $total_fee = new TotalFee();
        $cart = new Cart();

        $bto = new BtoFacade($machine_model, $cpu, $memory, $hdd, $total_fee, $cart);

        $bto->chooseModel(3);
        $bto->chooseCpu(3);
        $bto->chooseMemory(3);
        $bto->chooseHdd(3);
        
        $payment = $bto->getPayment();

        $this->assertSame(120000, $payment);
    }

    public function testShoppingVarious()
    {
        $machine_model = new PartsMachineModel ();
        $cpu = new PartsCpu();
        $memory = new PartsMemory();
        $hdd = new PartsHdd();
        $total_fee = new TotalFee();
        $cart = new Cart();

        $bto = new BtoFacade($machine_model, $cpu, $memory, $hdd, $total_fee, $cart);

        $bto->chooseModel(1);
        $bto->chooseCpu(2);
        $bto->chooseMemory(3);
        $bto->chooseHdd(3);
        
        $payment = $bto->getPayment();

        $this->assertSame(90000, $payment);
    }
}