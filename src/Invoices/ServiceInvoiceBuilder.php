<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Invoices;

class ServiecInvoiceBuilder extends InvoiceBuilder
{
    public function build(): Invoice
    {
        $this->invoice->setInvoiceType('Service Invoice');

        return $this->invoice;
    }
}
