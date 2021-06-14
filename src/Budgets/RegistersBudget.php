<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets;

use Fbsouzas\DesignPattern\Budgets\Exceptions\BudgetCannotBeRegisterException;
use Fbsouzas\DesignPattern\Budgets\States\Finished;

class RegistersBudget
{
    public function register(Budget $budget): void
    {
        if (!$budget->state instanceof Finished) {
            throw new BudgetCannotBeRegisterException("Only finished budgets could be registered in the API.");
        }

        echo 'Does request to register budget in the API' . PHP_EOL;
        echo PHP_EOL;
    }
}
