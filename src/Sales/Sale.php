<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Sales;

use DateTimeInterface;
use Fbsouzas\DesignPattern\Orders\Order;

class Sale
{
    private Order $order;
    private DateTimeInterface $realizedAt;

    public function __construct(Order $order, DateTimeInterface $realizedAt)
    {
        $this->order = $order;
        $this->realizedAt = $realizedAt;
    }

    public function value(): float
    {
        return $this->order->value();
    }

    public function realizedAt(): string
    {
        return $this->realizedAt->format('Y-m-d H:i:s');
    }
}
