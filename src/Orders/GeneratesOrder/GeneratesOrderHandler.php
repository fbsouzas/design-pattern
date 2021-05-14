<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder;

use DateTimeImmutable;
use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions\GeneratesOrderLog;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions\SaveOrderOnDB;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions\SendTheOrderByEmail;
use Fbsouzas\DesignPattern\Orders\Order;

class GeneratesOrderHandler
{
    public function execute(GeneratesOrderCommand $command): void
    {
        $budget = new Budget();

        $budget->quantityOfItems = $command->quantityItems;
        $budget->value = $command->budgetValue;

        $order = new Order();

        $order->finishDate = new DateTimeImmutable();
        $order->clientName = $command->clientName;
        $order->budget = $budget;

        $repository = new SaveOrderOnDB();
        $logger = new GeneratesOrderLog();
        $sender = new SendTheOrderByEmail();

        $repository->execute($order);
        $logger->execute($order);
        $sender->execute($order);
    }
}
