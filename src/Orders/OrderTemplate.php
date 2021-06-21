<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders;

use DateTimeImmutable;
use DateTimeInterface;

class OrderTemplate
{
    private string $clientName;
    private DateTimeInterface $finishDate;

    public function __construct(string $clientName, string $finishDate)
    {
        $this->clientName = $clientName;
        $this->finishDate = new DateTimeImmutable($finishDate);
    }

    public function clientName(): string
    {
        return $this->clientName;
    }

    public function finishDate(): DateTimeInterface
    {
        return $this->finishDate;
    }
}
