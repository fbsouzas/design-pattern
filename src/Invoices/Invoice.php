<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Invoices;

use DateTimeInterface;
use Fbsouzas\DesignPattern\Orders\Order;

class Invoice
{
    private string $companyCNPJ;
    private string $companyName;
    private string $companyContact;
    private string $companyAddress;
    private Order $order;
    private string $observation;
    private DateTimeInterface $generatedAt;

    public function setCompanyCNPJ(string $companyCNPJ): void
    {
        $this->companyCNPJ = $companyCNPJ;
    }

    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function setCompanyContact(string $companyContact): void
    {
        $this->companyContact = $companyContact;
    }

    public function setCompanyAddress(string $companyAddress): void
    {
        $this->companyAddress = $companyAddress;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function setObservation(string $observation): void
    {
        $this->observation = $observation;
    }

    public function setGeneratedAt(DateTimeInterface $generatedAt): void
    {
        $this->generatedAt = $generatedAt;
    }

    public function companyCNPJ(): string
    {
        return $this->companyCNPJ;
    }

    public function companyName(): string
    {
        return $this->companyName;
    }

    public function companyContact(): string
    {
        return $this->companyContact;
    }

    public function companyAddress(): string
    {
        return $this->companyAddress;
    }

    public function observation(): string
    {
        return $this->observation;
    }

    public function generatedAt(): string
    {
        return $this->generatedAt->format('Y-m-d H:i:s');
    }

    public function value(): float
    {
        return $this->order->value();
    }

    public function quantityOfItems(): int
    {
        return $this->order->quantityOfItems();
    }

    public function items(): array
    {
        return $this->order->items();
    }
}
