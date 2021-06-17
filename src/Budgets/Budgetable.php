<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets;

interface Budgetable
{
    public function value(): float;

    public function quantityOfItems(): int;
}
