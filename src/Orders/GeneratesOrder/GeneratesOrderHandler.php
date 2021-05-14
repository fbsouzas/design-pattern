<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder;

use DateTimeImmutable;
use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions\ActionAfterGenerateAnOrder;
use Fbsouzas\DesignPattern\Orders\Order;

class GeneratesOrderHandler
{
    private array $actions = [];

    public function addAction(ActionAfterGenerateAnOrder $action): void
    {
        $this->actions[] = $action;
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

        foreach ($this->actions as $action) {
            $action->execute($order);
        }
    }
}
