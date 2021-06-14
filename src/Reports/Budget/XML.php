<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Reports\Budget;

use Fbsouzas\DesignPattern\Budgets\Budget;
use SimpleXMLElement;

class XML
{
    public function export(Budget $budget): string
    {
        $budgetElement = new SimpleXMLElement('<budget />');

        $budgetElement->addChild('value', (string) $budget->value);
        $budgetElement->addChild('quantity_items', (string) $budget->quantityOfItems);

        return $budgetElement->asXML();
    }
}
