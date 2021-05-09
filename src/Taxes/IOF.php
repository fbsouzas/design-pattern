<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class IOF implements Tax
{
    public function calculate(Budget $budget): float
    {
        if ($budget->value > 500) {
            return $budget->value * 0.04;
        }

        return $budget->value * 0.03;
    }
}
