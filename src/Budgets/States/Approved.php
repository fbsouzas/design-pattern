<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets\States;

use Fbsouzas\DesignPattern\Budgets\Budget;

class Approved extends State
{
    /**
     * {@inheritDoc}
     */
    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.02;
    }

    /**
     * {@inheritDoc}
     */
    public function finish(Budget $budget): void
    {
        $budget->state = new Finished();
    }
}
