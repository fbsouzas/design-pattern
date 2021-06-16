<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets;

use Fbsouzas\DesignPattern\Budgets\States\InApproval;
use Fbsouzas\DesignPattern\Budgets\States\State;
use Fbsouzas\DesignPattern\Items\Item;

class Budget
{
    private array $items;
    public int $quantityOfItems;
    private float $value;
    public State $state;

    public function __construct()
    {
        $this->items = [];
        $this->value = 0;
        $this->quantityOfItems = 0;
        $this->state = new InApproval();
    }

    public function calculateExtraDiscount(): void
    {
        $this->value -= $this->state->calculateExtraDiscount($this);
    }

    public function addItem(Item $item): void
    {
        $this->setValue($item->value);
        $this->setQuantityOfItems();

        $this->items[] = $item;
    }

    private function setValue(float $value): void
    {
        $this->value += $value;
    }

    private function setQuantityOfItems(): void
    {
        $this->quantityOfItems += 1;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function quantityOfItems(): int
    {
        return $this->quantityOfItems;
    }

    public function approve(): void
    {
        $this->state->approve($this);
    }

    public function disapprove(): void
    {
        $this->state->disapprove($this);
    }

    public function finish(): void
    {
        $this->state->finish($this);
    }
}
