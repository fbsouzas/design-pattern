<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets;

use Fbsouzas\DesignPattern\Budgets\Exceptions\BudgetCannotBeRegisterException;
use Fbsouzas\DesignPattern\Budgets\Services\HttpAdapter;
use Fbsouzas\DesignPattern\Budgets\States\Finished;

class RegistersBudget
{
    private HttpAdapter $http;

    public function __construct(HttpAdapter $http)
    {
        $this->http = $http;
    }

    public function register(Budget $budget): void
    {
        if (!$budget->state instanceof Finished) {
            throw new BudgetCannotBeRegisterException("Only finished budgets could be registered in the API.");
        }

        $this->http->post('http://api.register.budget/', [
            'value' => $budget->value,
            'quantity_items' => $budget->quantityOfItems,
        ]);
    }
}
