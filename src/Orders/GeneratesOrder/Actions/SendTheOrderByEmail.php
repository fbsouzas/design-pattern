<?php

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions;

use Fbsouzas\DesignPattern\Orders\Order;

class SendTheOrderByEmail
{
    public function execute(Order $order): void
    {
        echo "Sending email of the order finish at {$order->finishDate->format('Y-m-d')}" . PHP_EOL;
    }
}
