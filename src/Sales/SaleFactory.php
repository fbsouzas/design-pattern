<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Sales;

use Fbsouzas\DesignPattern\Taxes\Tax;

interface SaleFactory
{
    public function crateSale(): Sale;

    public function tax(): Tax;
}
