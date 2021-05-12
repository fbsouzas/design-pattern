<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder;

use DateTimeImmutable;
use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Orders\Order;

class GeneratesOrderHandler
{
    private string $orderRepository;
    private string $mailService;
    private string $logService;

    public function __construct()
    {
        $this->orderRepository = 'Creates order on the database.';
        $this->mailService = 'Sends email to client.';
        $this->logService = 'Order created.';
    }

    public function execute(GeneratesOrderCommand $command): void
    {
        $budget = new Budget();

        $budget->quantityOfItems = $command->quantityItems;
        $budget->value = $command->budgetValue;

        $order = new Order();

        $order->finishDate = new DateTimeImmutable();
        $order->clientName = $command->clientName;
        $order->budget = $budget;

        echo $this->orderRepository . PHP_EOL;
        echo $this->mailService . PHP_EOL;
        echo $this->logService . PHP_EOL;
    }
}
