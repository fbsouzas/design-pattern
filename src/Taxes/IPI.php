<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class IPI implements Tax
{
    public function calculate(Budget $budget): float
    {
        if ($budget->value > 300 && $budget->quantityOfItems > 3) {
            return $budget->value * 0.04;
        }

        return $budget->value * 0.025;
    }
}
