<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions;

use Fbsouzas\DesignPattern\Orders\Order;

class GeneratesOrderLog implements ActionAfterGenerateAnOrder
{
    public function execute(Order $order): void
    {
        echo "New order generated for the client {$order->clientName}" . PHP_EOL;
    }
}
