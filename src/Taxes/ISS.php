<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class ISS extends Tax
{
    public function calculateSpecificTax(Budget $budget): float
    {
        return $budget->value * 0.06;
    }
}
