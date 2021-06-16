<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Discounts;

use Fbsouzas\DesignPattern\Budgets\Budget;

class DiscountToValueHigherThan500 extends Discount
{
    public function calculate(Budget $budget): float
    {
        if ($budget->value() > 500) {
            return $budget->value() * 0.05;
        }

        return $this->nextDiscount->calculate($budget);
    }
}
