<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

abstract class TaxWith2TaxRates implements Tax
{
    public function calculate(Budget $budget): float
    {
        if ($this->shouldApplyTheMaximumTaxRate($budget)) {
            return $this->maximumTaxRate($budget);
        }

        return $this->minimumTaxRate($budget);
    }

    abstract protected function shouldApplyTheMaximumTaxRate(Budget $budget): bool;

    abstract protected function maximumTaxRate(Budget $budget): float;

    abstract protected function minimumTaxRate(Budget $budget): float;
}
