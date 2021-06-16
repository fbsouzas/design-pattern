<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder;

use DateTimeImmutable;
use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Items\Item;
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
        $item = new Item();

        $item->value = $command->budgetValue;

        $budget->addItem($item);

        $order = new Order();

        $order->finishDate = new DateTimeImmutable();
        $order->clientName = $command->clientName;
        $order->budget = $budget;

        foreach ($this->actions as $action) {
            $action->execute($order);
        }
    }
}
