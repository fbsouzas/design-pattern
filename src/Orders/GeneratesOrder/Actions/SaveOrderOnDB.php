<?php

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions;

use Fbsouzas\DesignPattern\Orders\Order;

class SaveOrderOnDB
{
    public function execute(Order $order): void
    {
        echo "Saving client's order {$order->clientName} on database" . PHP_EOL;
    }
}
