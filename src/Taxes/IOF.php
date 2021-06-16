<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class IOF extends TaxWith2TaxRates
{
    protected function shouldApplyTheMaximumTaxRate(Budget $budget): bool
    {
        return $budget->value() > 500;
    }

    protected function maximumTaxRate(Budget $budget): float
    {
        return $budget->value() * 0.04;
    }

    protected function minimumTaxRate(Budget $budget): float
    {
        return $budget->value() * 0.03;
    }
}
