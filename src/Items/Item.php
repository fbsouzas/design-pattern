<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Items;

use Fbsouzas\DesignPattern\Budgets\Budgetable;

class Item implements Budgetable
{
    private float $value;
    private int $quantityOfItems;

    public function __construct(float $value)
    {
        $this->value = $value;
        $this->quantityOfItems = 1;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function quantityOfItems(): int
    {
        return $this->quantityOfItems;
    }
}
