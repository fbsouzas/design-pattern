<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder;

class GeneratesOrderCommand
{
    public float $budgetValue;
    public int $quantityItems;
    public string $clientName;

    public function __construct(float $budgetValue, int $quantityItems, string $clientName)
    {
        $this->budgetValue = $budgetValue;
        $this->quantityItems = $quantityItems;
        $this->clientName = $clientName;
    }
}
