<?php

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Orders\Order;

require 'vendor/autoload.php';

$orders = [];

for ($i = 0; $i < 100000; $i++) {
    $order = new Order();

    $order->clientName = md5('a');
    $order->finishDate = new DateTimeImmutable();
    $order->budget = new Budget();


    $orders[] = $order;
}

echo memory_get_peak_usage() . PHP_EOL;
