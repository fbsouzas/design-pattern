<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets\States;

use Fbsouzas\DesignPattern\Budgets\Budget;

class InApproval extends State
{
    /**
     * {@inheritDoc}
     */
    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.05;
    }

    /**
     * {@inheritDoc}
     */
    public function approve(Budget $budget): void
    {
        $budget->state = new Approved();
    }

    /**
     * {@inheritDoc}
     */
    public function disapprove(Budget $budget): void
    {
        $budget->state = new Disapproved();
    }
}
