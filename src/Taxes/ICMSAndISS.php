<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Taxes;

use Fbsouzas\DesignPattern\Budgets\Budget;

class ICMSAndISS implements Tax
{
    public function calculate(Budget $budget): float
    {
        return (new ICMS())->calculate($budget) + (new ISS())->calculate($budget);
    }
}
