<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Sales;

use DateTimeInterface;
use Fbsouzas\DesignPattern\Orders\Order;

class ServiceSale extends Sale
{
    private string $providerName;

    public function __construct(Order $order, DateTimeInterface $realizedAt, string $providerName)
    {
        parent::__construct($order, $realizedAt);

        $this->providerName = $providerName;
    }
}
