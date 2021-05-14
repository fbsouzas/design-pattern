<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions;

use Fbsouzas\DesignPattern\Orders\Order;

class SendTheOrderByEmail implements Action
{
    public function execute(Order $order): void
    {
        echo "Sending email of the order finish at {$order->finishDate->format('Y-m-d')}" . PHP_EOL;
    }
}
