<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Discounts;

use Fbsouzas\DesignPattern\Budgets\Budget;

class NoDiscount extends Discount
{
    public function __construct()
    {
        parent::__construct(null);
    }

    public function calculate(Budget $budget): float
    {
        return 0;
    }
}
