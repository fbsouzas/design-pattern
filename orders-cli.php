<?php

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Budgets\BudgetList;
use Fbsouzas\DesignPattern\Budgets\RegistersBudget;
use Fbsouzas\DesignPattern\Budgets\Services\GuzzleHttpAdapter;
use Fbsouzas\DesignPattern\Budgets\States\Finished;
use Fbsouzas\DesignPattern\Reports\Budget\BudgetReportData;
use Fbsouzas\DesignPattern\Reports\XMLReportType;
use Fbsouzas\DesignPattern\Taxes\ICMS;
use Fbsouzas\DesignPattern\Taxes\ISS;
use Fbsouzas\DesignPattern\Taxes\TaxCalculator;

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

foreach ($budgetList as $budget) {
    echo 'Value: ' . $budget->value . PHP_EOL;
    echo 'Items quantity: ' . $budget->quantityOfItems . PHP_EOL;
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
