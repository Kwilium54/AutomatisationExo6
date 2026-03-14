<?php

namespace Test;

use PHPUnit\Framework\TestCase;

use App\Laptop;
use App\GPUDecorator;
use App\OLEDScreenDecorator;

class ComputerDecoratorTest extends TestCase
{
    public function testBasicLaptop()
    {
        $laptop = new Laptop();
        
        $this->assertSame(400, $laptop->getPrice());
        $this->assertSame("A laptop computer", $laptop->getDescription());
    }

    public function testLaptopWithGPU()
    {
        $laptop = new Laptop();
        $gpu = new GPUDecorator($laptop);

        $this->assertSame(600, $gpu->getPrice());
        $this->assertSame('A laptop computer with GPU', $gpu->getDescription());
    }

    public function testLaptopWithOLEDScreen()
    {
        $laptop = new Laptop();
        $oled = new OLEDScreenDecorator($laptop);

        $this->assertSame(700, $oled->getPrice());
        $this->assertSame('A laptop computer with OLED screen', $oled->getDescription());
    }
}