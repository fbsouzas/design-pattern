<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions;

use Fbsouzas\DesignPattern\Orders\Order;

class SaveOrderOnDB implements ActionAfterGenerateAnOrder
{
    public function execute(Order $order): void
    {
        echo "Saving client's order {$order->clientName} on database" . PHP_EOL;
    }
}
