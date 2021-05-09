<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Discounts;

use Fbsouzas\DesignPattern\Budgets\Budget;

class DiscountToMoreThan5Items extends Discount
{
    public function calculate(Budget $budget): float
    {
        if ($budget->quantityOfItems > 5) {
            return $budget->value * 0.1;
        }

        return $this->nextDiscount->calculate($budget);
    }
}
