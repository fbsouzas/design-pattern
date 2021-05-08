<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class TaxCalculator
{
    public function calculate(Budget $budget, string $taxName): float
    {
        switch ($taxName) {
            case 'ICMS':
                return $budget->value * 0.1;
            case 'ISS':
                return $budget->value * 0.06;
        }
        return $budget->value * 0.06;
    }
}
