<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Discounts;

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Logs\FileLogManager;
use Fbsouzas\DesignPattern\Logs\StdoutLogManager;

class DiscountCalculator
{
    public function calculate(Budget $budget): float
    {
        $stdoutLogManager = new StdoutLogManager();
        $fileLogManager = new FileLogManager(__DIR__ . '/../../app.log');

        $chainOfDiscount = new DiscountToMoreThan5Items(
            new DiscountToValueHigherThan500(
                new NoDiscount()
            )
        );

        $discountValue = $chainOfDiscount->calculate($budget);

        $stdoutLogManager->log('info', "The discount value is: {$discountValue}");
        $fileLogManager->log('info', "The discount value is: {$discountValue}");

        return $discountValue;
    }
}
