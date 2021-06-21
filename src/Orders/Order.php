<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders;

use Fbsouzas\DesignPattern\Budgets\Budget;

class Order
{
    public OrderTemplate $orderTemplate;
    public Budget $budget;
}
