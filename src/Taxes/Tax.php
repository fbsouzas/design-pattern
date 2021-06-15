<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

abstract class Tax
{
    private ?Tax $anotherTax;

    public function __construct(Tax $anotherTax = null)
    {
        $this->anotherTax = $anotherTax;
    }

    abstract protected function calculateSpecificTax(Budget $budget): float;

    public function calculate(Budget $budget): float
    {
        return $this->calculateSpecificTax($budget) + $this->calculateAnotherTax($budget);
    }

    public function calculateAnotherTax(Budget $budget): float
    {
        if (null === $this->anotherTax) {
            return 0;
        }

        return $this->anotherTax->calculateSpecificTax($budget);
    }
}
