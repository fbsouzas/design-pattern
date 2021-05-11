<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets;

use DomainException;

class Budget
{
    public int $quantityOfItems;
    public float $value;
    public string $state;

    public function applyExtraDiscount(): void
    {
        $this->value -= $this->calculateExtraDiscount();
    }

    /**
     * @throws DomainException
     */
    private function calculateExtraDiscount(): float
    {
        if ($this->state == 'IN_APPROVAL') {
            return $this->value * 0.05;
        }

        if ($this->state == 'APPROVED') {
            return $this->value * 0.02;
        }

        throw new DomainException('A budget disapproved or finished can not received an extra discount.');
    }
}
