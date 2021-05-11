<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets;

use Fbsouzas\DesignPattern\Budgets\States\InApproval;
use Fbsouzas\DesignPattern\Budgets\States\State;

class Budget
{
    public int $quantityOfItems;
    public float $value;
    public State $state;

    public function __construct()
    {
        $this->state = new InApproval();
    }

    public function calculateExtraDiscount(): void
    {
        $this->value -= $this->state->calculateExtraDiscount($this);
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
