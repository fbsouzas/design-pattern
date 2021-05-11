<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets\States;

use DomainException;
use Fbsouzas\DesignPattern\Budgets\Budget;

abstract class State
{
    /**
     * @throws DomainException
     */
    abstract public function calculateExtraDiscount(Budget $budget): float;

    /**
     * @throws DomainException
     */
    public function approve(Budget $budget): void
    {
        throw new DomainException('This budget can not be approved.');
    }

    /**
     * @throws DomainException
     */
    public function disapprove(Budget $budget): void
    {
        throw new DomainException('This budget can not be approved.');
    }

    /**
     * @throws DomainException
     */
    public function finish(Budget $budget): void
    {
        throw new DomainException('This budget can not be approved.');
    }
}
