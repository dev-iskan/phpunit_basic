<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsException();
        }

        // removes 0 from operands
        $filteredOperands = array_filter($this->operands);

        return array_reduce($filteredOperands, function ($a, $b) {
            if ($a !== null && $b !== null) {
                return $a/$b;
            }

            return $b;
        }, null);
    }
}