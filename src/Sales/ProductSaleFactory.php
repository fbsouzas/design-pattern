<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Sales;

use DateTimeImmutable;
use Fbsouzas\DesignPattern\Orders\Order;
use Fbsouzas\DesignPattern\Taxes\ICMS;
use Fbsouzas\DesignPattern\Taxes\Tax;

class ProductSaleFactory implements SaleFactory
{
    private Order $order;
    private int $quantityOfItems;

    public function __construct(Order $order, int $quantityOfItems)
    {
        $this->order = $order;
        $this->quantityOfItems = $quantityOfItems;
    }

    public function crateSale(): Sale
    {
        return new ProductSale($this->order, new DateTimeImmutable(), $this->quantityOfItems);
    }

    public function tax(): Tax
    {
        return new ICMS();
    }
}
