<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Discounts;

class LogDiscount
{
    public function log(float $discountValue): void
    {
        echo "Log the value of the discount: {$discountValue}" . PHP_EOL;
        echo PHP_EOL;
    }
}
