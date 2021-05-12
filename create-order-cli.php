<?php

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Orders\Order;

require 'vendor/autoload.php';

$budgetValue = $argv[1];
$quantityItems = $argv[2];
$clientName = $argv[3];

$budget = new Budget();

$budget->quantityOfItems = $quantityItems;
$budget->value = $budgetValue;

$order = new Order();

$order->finishDate = new DateTimeImmutable();
$order->clientName = $clientName;
$order->budget = $budget;

echo "Creates order on the database" . PHP_EOL;
echo "Sends email to client" . PHP_EOL;
