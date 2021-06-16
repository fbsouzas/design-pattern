<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class ICMS extends Tax
{
    protected function calculateSpecificTax(Budget $budget): float
    {
        return $budget->value() * 0.1;
    }
}
