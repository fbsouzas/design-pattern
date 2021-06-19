<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Items;

use Fbsouzas\DesignPattern\Budgets\Budgetable;

class Item implements Budgetable
{
    private string $code;
    private float $value;
    private int $quantityOfItems;

    public function __construct(string $code, float $value)
    {
        $this->code = $code;
        $this->value = $value;
        $this->quantityOfItems = 1;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function value(): float
    {
        // It simulates that the item value is an external service
        sleep(1);

        return $this->value;
    }

    public function quantityOfItems(): int
    {
        return $this->quantityOfItems;
    }
}
