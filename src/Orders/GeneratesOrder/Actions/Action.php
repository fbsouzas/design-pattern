<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions;

use Fbsouzas\DesignPattern\Orders\Order;

interface Action
{
    public function execute(Order $order): void;
}
