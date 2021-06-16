<?php

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Budgets\BudgetList;
use Fbsouzas\DesignPattern\Budgets\RegistersBudget;
use Fbsouzas\DesignPattern\Budgets\Services\GuzzleHttpAdapter;
use Fbsouzas\DesignPattern\Budgets\States\Finished;
use Fbsouzas\DesignPattern\Items\Item;
use Fbsouzas\DesignPattern\Reports\Budget\BudgetReportData;
use Fbsouzas\DesignPattern\Reports\XMLReportType;
use Fbsouzas\DesignPattern\Taxes\ICMS;
use Fbsouzas\DesignPattern\Taxes\ISS;
use Fbsouzas\DesignPattern\Taxes\TaxCalculator;

require 'vendor/autoload.php';

$item1 = new Item();
$item1->value = 500;

$item2 = new Item();
$item2->value = 300;

$budget1 = new Budget();
$budget1->addItem($item1);
$budget1->addItem($item2);
$budget1->approve();

$budget2 = new Budget();
$budget2->addItem($item1);
$budget2->addItem($item2);
$budget2->approve();
$budget2->finish();

$budget3 = new Budget();
$budget3->addItem($item1);
$budget3->addItem($item2);
$budget3->disapprove();

$budgetList = new BudgetList();
$budgetList->addBudget($budget1);
$budgetList->addBudget($budget2);
$budgetList->addBudget($budget3);

foreach ($budgetList as $budget) {
    echo 'Value: ' . $budget->value() . PHP_EOL;
    echo 'Items quantity: ' . $budget->quantityOfItems() . PHP_EOL;
    echo 'Stastus: ' . get_class($budget->state) . PHP_EOL;
    echo PHP_EOL;

    if ($budget->state instanceof Finished) {
        $registersBudget = new RegistersBudget(new GuzzleHttpAdapter());

        $registersBudget->register($budget);
    }

    $taxCalculator = new TaxCalculator();

    echo 'Tax: ' . $taxCalculator->calculate($budget, new ICMS(new ISS())) . PHP_EOL;
    echo PHP_EOL;
}

$reportData = new BudgetReportData($budget1);
$xmlReportType = new XMLReportType('budget');

$xmlReportType->export($reportData);
