<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets\States;

use DomainException;
use Fbsouzas\DesignPattern\Budgets\Budget;

class Finished extends State
{
    /**
     * {@inheritDoc}
     */
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new DomainException('A finished budget can not receive a discount.');
    }
}
