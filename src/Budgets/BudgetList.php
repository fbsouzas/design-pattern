<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets;

use ArrayIterator;
use IteratorAggregate;

class BudgetList implements IteratorAggregate
{
    /** @var array<Budget> */
    private array $budgets;

    public function __construct()
    {
        $this->budgets = [];
    }

    public function addBudget(Budget $budget): void
    {
        $this->budgets[] = $budget;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->budgets);
    }
}
