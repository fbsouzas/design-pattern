<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder;

use Fbsouzas\DesignPattern\Budgets\Budget;

class GeneratesOrderCommand
{
    public Budget $budget;
    public string $clientName;

    public function __construct(Budget $budget, string $clientName)
    {
        $this->budget = $budget;
        $this->clientName = $clientName;
    }
}
