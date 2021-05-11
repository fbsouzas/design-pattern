<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets\States;

use DomainException;
use Fbsouzas\DesignPattern\Budgets\Budget;

class Disapproved extends State
{
    /**
     * {@inheritDoc}
     */
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new DomainException('A disapproved budget can not receive a discount.');
    }

    /**
     * {@inheritDoc}
     */
    public function finish(Budget $budget): void
    {
        $budget->state = new Finished();
    }
}
