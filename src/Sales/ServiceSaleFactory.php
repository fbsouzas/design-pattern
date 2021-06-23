<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Sales;

use DateTimeImmutable;
use Fbsouzas\DesignPattern\Orders\Order;
use Fbsouzas\DesignPattern\Taxes\ISS;
use Fbsouzas\DesignPattern\Taxes\Tax;

class ServiceSaleFactory implements SaleFactory
{
    private Order $order;
    private string $providerName;

    public function __construct(Order $order, string $providerName)
    {
        $this->order = $order;
        $this->providerName = $providerName;
    }

    public function crateSale(): Sale
    {
        return new ServiceSale($this->order, new DateTimeImmutable(), $this->providerName);
    }

    public function tax(): Tax
    {
        return new ISS();
    }
}
