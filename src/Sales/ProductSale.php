<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Sales;

use DateTimeInterface;
use Fbsouzas\DesignPattern\Orders\Order;

class ProductSale extends Sale
{
    private int $quantityOfItems;

    public function __construct(Order $order, DateTimeInterface $realizedAt, int $quantityOfItems)
    {
        parent::__construct($order, $realizedAt);

        $this->quantityOfItems = $quantityOfItems;
    }

    public function quantityOfItems(): int
    {
        return $this->quantityOfItems;
    }
}
