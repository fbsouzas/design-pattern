<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class TaxCalculator
{
    public function calculate(Budget $budget, Tax $tax): float
    {
        return $tax->calculate($budget);
    }
}
