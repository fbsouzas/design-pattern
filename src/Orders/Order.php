<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders;

use DateTimeInterface;
use Fbsouzas\DesignPattern\Budgets\Budget;

class Order
{
    public string $clientName;
    public DateTimeInterface $finishDate;
    public Budget $budget;
}
