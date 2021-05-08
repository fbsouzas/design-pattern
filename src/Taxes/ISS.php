<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class ISS implements Tax
{
    public function calculate(Budget $budget): float
    {
        return $budget->value * 0.06;
    }
}
