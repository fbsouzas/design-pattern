<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Reports\Budget;

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Reports\ReportData;

class BudgetReportData implements ReportData
{
    private Budget $budget;

    public function __construct(Budget $budget)
    {
        $this->budget = $budget;
    }

    public function data(): array
    {
        return [
            'value' => $this->budget->value(),
            'quantity_items' => $this->budget->quantityOfItems(),
        ];
    }
}
