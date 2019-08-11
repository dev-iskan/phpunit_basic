<?php

class CalculatorTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_can_set_single_operation()
    {
        $addition = new \App\Calculator\Addition();
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

    public function test_it_can_set_multiple_operations()
    {
        $addition1 = new \App\Calculator\Addition();
        $addition1->setOperands([5, 10]);

        $addition2 = new \App\Calculator\Addition();
        $addition2->setOperands([2, 2]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    public function test_operations_are_ignored_if_not_instance_of_operation_interface()
    {
        $addition1 = new \App\Calculator\Addition();
        $addition1->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperations([$addition1, 'cats']);

        $this->assertCount(1, $calculator->getOperations());
    }

    public function test_it_can_calculate_operation()
    {
        $addition1 = new \App\Calculator\Addition();
        $addition1->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperation($addition1);

        $this->assertEquals(15, $calculator->calculate());
    }

    public function test_it_can_calculate_operations()
    {
        $addition1 = new \App\Calculator\Addition();
        $addition1->setOperands([5, 10]);

        $addition2 = new \App\Calculator\Addition();
        $addition2->setOperands([2, 2]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertTrue(is_array($calculator->calculate()));
        $this->assertEquals(15, $calculator->calculate()[0]);
        $this->assertEquals(4, $calculator->calculate()[1]);
    }
}