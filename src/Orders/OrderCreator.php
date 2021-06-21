<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders;

use DateTimeImmutable;
use Fbsouzas\DesignPattern\Budgets\Budget;

class OrderCreator
{
    private array $templates = [];

    public function create(string $clientName, string $formattedDate, Budget $budget): Order
    {
        $order = new Order();

        $order->orderTemplate = $this->orderTemplateGenerator($clientName, $formattedDate);
        $order->budget = $budget;

        return $order;
    }

    private function orderTemplateGenerator(string $clientName, string $formattedDate): OrderTemplate
    {
        $key = md5($clientName . $formattedDate);

        if (!array_key_exists($key, $this->templates)) {
            $this->templates[$key] = new OrderTemplate($clientName, new DateTimeImmutable($formattedDate));
        }

        return $this->templates[$key];
    }
}
