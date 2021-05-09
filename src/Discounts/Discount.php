<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Discounts;

use Fbsouzas\DesignPattern\Budgets\Budget;

abstract class Discount
{
    protected ?Discount $nextDiscount;

    public function __construct(?Discount $nextDiscount)
    {
        $this->nextDiscount = $nextDiscount;
    }

    abstract public function calculate(Budget $budget): float;
}
