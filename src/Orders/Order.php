<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders;

use Fbsouzas\DesignPattern\Budgets\Budget;

class Order
{
    public OrderTemplate $orderTemplate;
    private Budget $budget;

    public function __construct(Budget $budget)
    {
        $this->budget = $budget;
    }

    public function value(): float
    {
        return $this->budget->value();
    }

    public function quantityOfItems(): int
    {
        return $this->budget->quantityOfItems();
    }

    public function items(): array
    {
        return $this->budget->items();
    }
}
