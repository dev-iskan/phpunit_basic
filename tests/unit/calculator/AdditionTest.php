<?php

use App\Calculator\Addition;

class AdditionTest extends \PHPUnit\Framework\TestCase
{
    public function test_adds_up_given_operands()
    {
        $addition = new Addition;
        $addition->setOperands([5, 10]);

        $this->assertEquals(15, $addition->calculate());
    }

    public function test_no_arguments_given_to_calculate()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new Addition;
        $addition->calculate();
    }
}