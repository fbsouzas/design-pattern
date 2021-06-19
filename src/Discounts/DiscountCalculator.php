<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Discounts;

use Fbsouzas\DesignPattern\Budgets\Budget;

class DiscountCalculator
{
    public function calculate(Budget $budget): float
    {
        $logDicount = new LogDiscount();
        $chainOfDiscount = new DiscountToMoreThan5Items(
            new DiscountToValueHigherThan500(
                new NoDiscount()
            )
        );

        $discountValue = $chainOfDiscount->calculate($budget);

        $logDicount->log($discountValue);

        return $discountValue;
    }
}
