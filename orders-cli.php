<?php

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Budgets\BudgetList;

require 'vendor/autoload.php';

$budget1 = new Budget();
$budget1->quantityOfItems = 7;
$budget1->value = 700;
$budget1->approve();

$budget2 = new Budget();
$budget2->quantityOfItems = 15;
$budget2->value = 1500.52;
$budget2->approve();
$budget2->finish();

$budget3 = new Budget();
$budget3->quantityOfItems = 3;
$budget3->value = 50;
$budget3->disapprove();

$budgetList = new BudgetList();
$budgetList->addBudget($budget1);
$budgetList->addBudget($budget2);
$budgetList->addBudget($budget3);

foreach ($budgetList->budgets() as $budget) {
    echo 'Value: ' . $budget->value . PHP_EOL;
    echo 'Items quantity: ' . $budget->quantityOfItems . PHP_EOL;
    echo 'Stastus: ' . get_class($budget->state) . PHP_EOL;
    echo PHP_EOL;
}
