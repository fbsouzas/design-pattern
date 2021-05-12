<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder;

use DateTimeImmutable;
use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Orders\Order;

class GeneratesOrder implements Command
{
    private float $budgetValue;
    private int $quantityItems;
    private string $clientName;

    public function __construct(float $budgetValue, int $quantityItems, string $clientName)
    {
        $this->budgetValue = $budgetValue;
        $this->quantityItems = $quantityItems;
        $this->clientName = $clientName;
    }

    public function execute(): void
    {
        $budget = new Budget();

        $budget->quantityOfItems = $this->quantityItems;
        $budget->value = $this->budgetValue;

        $order = new Order();

        $order->finishDate = new DateTimeImmutable();
        $order->clientName = $this->clientName;
        $order->budget = $budget;

        echo "Creates order on the database" . PHP_EOL;
        echo "Sends email to client" . PHP_EOL;
    }
}
