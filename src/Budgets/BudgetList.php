<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets;

class BudgetList
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

    public function budgets(): array
    {
        return $this->budgets;
    }
}
