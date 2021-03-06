<?php

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Budgets\BudgetList;
use Fbsouzas\DesignPattern\Budgets\RegistersBudget;
use Fbsouzas\DesignPattern\Budgets\Services\GuzzleHttpAdapter;
use Fbsouzas\DesignPattern\Budgets\States\Finished;
use Fbsouzas\DesignPattern\Discounts\DiscountCalculator;
use Fbsouzas\DesignPattern\Invoices\ProductInvoiceBuilder;
use Fbsouzas\DesignPattern\Items\Item;
use Fbsouzas\DesignPattern\Items\ItemCacheProxy;
use Fbsouzas\DesignPattern\Orders\OrderCreator;
use Fbsouzas\DesignPattern\PdoConnection;
use Fbsouzas\DesignPattern\Reports\Budget\BudgetReportData;
use Fbsouzas\DesignPattern\Reports\XMLReportType;
use Fbsouzas\DesignPattern\Sales\ProductSaleFactory;
use Fbsouzas\DesignPattern\Taxes\TaxCalculator;

require 'vendor/autoload.php';

$item1000 = new ItemCacheProxy(new Item('I001', 1000));
$item500 = new ItemCacheProxy(new Item('I002', 500));
$item300 = new ItemCacheProxy(new Item('I003', 300));
$item100 = new ItemCacheProxy(new Item('I004', 100));

$moreOldBudget = new Budget();
$moreOldBudget->addItem($item1000);

$oldBudget = new Budget();
$oldBudget->addItem($item1000);
$oldBudget->addItem($item100);
$oldBudget->addItem($item100);
$oldBudget->addItem($item100);
$oldBudget->addItem($moreOldBudget);

$budget1 = new Budget();
$budget1->addItem($item500);
$budget1->addItem($item300);
$budget1->addItem($oldBudget);
$budget1->approve();
$budget1->finish();

$budget2 = new Budget();
$budget2->addItem($item500);
$budget2->addItem($item500);
$budget2->approve();

$budget3 = new Budget();
$budget3->addItem($item100);
$budget3->addItem($item100);
$budget3->disapprove();

$budget4 = clone $budget3;
$budget4->approve();
$budget4->finish();

$budgetList = new BudgetList();
$budgetList->addBudget($budget1);
$budgetList->addBudget($budget2);
$budgetList->addBudget($budget3);
$budgetList->addBudget($budget4);

foreach ($budgetList as $key => $budget) {
    echo 'Value: ' . $budget->value() . PHP_EOL;
    echo 'Items quantity: ' . $budget->quantityOfItems() . PHP_EOL;
    echo 'Stastus: ' . get_class($budget->state) . PHP_EOL;
    echo PHP_EOL;

    if ($budget->state instanceof Finished) {
        $registersBudget = new RegistersBudget(new GuzzleHttpAdapter());
        $discountCalculator = new DiscountCalculator();
        $taxCalculator = new TaxCalculator();
        $orderCreator = new OrderCreator();

        $registersBudget->register($budget);
        $discountCalculator->calculate($budget);

        $order = $orderCreator->create('F??bio Souza', date('Y-m-d'), $budget);

        $saleFactory = new ProductSaleFactory($order, $budget->quantityOfItems());

        /** @var $sale ProductSale */
        $sale = $saleFactory->crateSale();
        $tax = $taxCalculator->calculate($budget, $saleFactory->tax());

        echo PHP_EOL;
        echo 'Sale value: ' . $sale->value() . PHP_EOL;
        echo 'Sale quantity of items: ' . $sale->quantityOfItems() . PHP_EOL;
        echo 'Sale tax: ' . $tax . PHP_EOL;
        echo 'Sale realized at: ' . $sale->realizedAt() . PHP_EOL;
        echo PHP_EOL;

        $builder = new ProductInvoiceBuilder();

        $invoice = $builder->toTheCompany('The bigger tecnologic company', '123.123.1123.0001-12', '1 The bigger company St.')
            ->withContact('contact@thebiggercompany.com')
            ->forThisOrder($order)
            ->withTheTax($tax)
            ->withTheObservation('This is an invoice generated in the design pattern studies.')
            ->build();

        echo "------ Start Invoice ------" . PHP_EOL;
        echo "Data of the invoice" . PHP_EOL;
        echo "Date: {$invoice->generatedAt()}"  . PHP_EOL;
        echo "Invoice type: {$invoice->invoiceType()}"  . PHP_EOL;
        echo "Company: {$invoice->companyName()} - {$invoice->companyCNPJ()}"  . PHP_EOL;
        echo "Address: {$invoice->companyAddress()}" . PHP_EOL;
        echo "Contact: {$invoice->companyContact()}" . PHP_EOL;
        echo PHP_EOL;

        echo "Items:" . PHP_EOL;

        foreach ($invoice->items() as $item) {
            echo "Value: {$item->value()} Quantity: {$item->quantityOfItems()}" . PHP_EOL;
        }

        echo PHP_EOL;

        echo "Quantity of items: {$invoice->quantityOfItems()}" . PHP_EOL;
        echo "Value: {$invoice->value()}" . PHP_EOL;

        echo PHP_EOL;
        echo "-------------------------" . PHP_EOL;
        echo "Tax total: {$invoice->tax()}" . PHP_EOL;
        echo "Invoice total: {$invoice->total()}" . PHP_EOL;
        echo "------ End Invoice ------" . PHP_EOL;
        echo PHP_EOL;

        $reportData = new BudgetReportData($budget);
        $xmlReportType = new XMLReportType('budget');

        $xmlReportType->export($reportData);
    }
}
