<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Invoices;

use DateTimeImmutable;
use DateTimeInterface;
use Fbsouzas\DesignPattern\Orders\Order;

abstract class InvoiceBuilder
{
    protected Invoice $invoice;

    public function __construct()
    {
        $this->invoice = new Invoice();

        $this->invoice->setGeneratedAt(new DateTimeImmutable());
    }

    public function toTheCompany(string $name, string $cpnj, string $address): self
    {
        $this->invoice->setCompanyName($name);
        $this->invoice->setCompanyCNPJ($cpnj);
        $this->invoice->setCompanyAddress($address);

        return $this;
    }

    public function withContact(string $contact): self
    {
        $this->invoice->setCompanyContact($contact);

        return $this;
    }

    public function forThisOrder(Order $order): self
    {
        $this->invoice->setOrder($order);

        return $this;
    }

    public function withTheTax(float $tax): self
    {
        $this->invoice->setTax($tax);

        return $this;
    }

    public function withTheObservation(string $observation): self
    {
        $this->invoice->setObservation($observation);

        return $this;
    }

    public function inThisDate(DateTimeInterface $generatedAt): self
    {
        $this->invoice->setGeneratedAt($generatedAt);

        return $this;
    }

    abstract public function build(): Invoice;
}
