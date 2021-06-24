<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Invoices;

class ProductInvoiceBuilder extends InvoiceBuilder
{
    public function build(): Invoice
    {
        $this->invoice->setInvoiceType('Product Invoice');

        return $this->invoice;
    }
}
