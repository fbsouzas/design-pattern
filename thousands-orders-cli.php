<?php

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Orders\OrderCreator;

require 'vendor/autoload.php';

$orders = [];
$orderCreator = new OrderCreator();

for ($i = 0; $i < 100000; $i++) {
    $budget = new Budget();

    $orders[] = $orderCreator->create(
        'Client Name',
        date('Y-m-d'),
        $budget
    );
}

echo memory_get_peak_usage() . PHP_EOL;
