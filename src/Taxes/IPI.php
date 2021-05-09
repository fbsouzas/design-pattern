<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class IPI extends TaxWith2TaxRates
{
    protected function shouldApplyTheMaximumTaxRate(Budget $budget): bool
    {
        return $budget->value > 300 && $budget->quantityOfItems > 3;
    }

    protected function maximumTaxRate(Budget $budget): float
    {
        return $budget->value * 0.04;
    }

    protected function minimumTaxRate(Budget $budget): float
    {
        return $budget->value * 0.025;
    }
}
