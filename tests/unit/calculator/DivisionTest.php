<?php

class DivisionTest extends \PHPUnit\Framework\TestCase
{
    public function test_divides_given_operands()
    {
        $division = new \App\Calculator\Division();

        $division->setOperands([100, 2]);

        $this->assertEquals(50, $division->calculate());
    }

    public function test_no_arguments_given_to_calculate()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new \App\Calculator\Division();
        $addition->calculate();
    }

    public function test_removes_division_by_zero()
    {
        $division = new \App\Calculator\Division();

        $division->setOperands([10, 0, 0, 0, 0, 5]);

        $this->assertEquals(2, $division->calculate());
    }
}