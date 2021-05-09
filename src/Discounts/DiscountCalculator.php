<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Discounts;

use Fbsouzas\DesignPattern\Budgets\Budget;

class DiscountCalculator
{
    public function calculate(Budget $budget): float
    {

        $chainOfDiscount = new DiscountToMoreThan5Items(
            new DiscountToValueHigherThan500(
                new NoDiscount()
            )
        );

        return $chainOfDiscount->calculate($budget);
    }
}
