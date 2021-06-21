<?php

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Orders\Order;
use Fbsouzas\DesignPattern\Orders\OrderTemplate;

require 'vendor/autoload.php';

$orders = [];
$orderTemplate = new OrderTemplate(md5('a'), date('Y-m-d'));

for ($i = 0; $i < 100000; $i++) {
    $order = new Order();

    $order->orderTemplate = $orderTemplate;
    $order->budget = new Budget();

    $orders[] = $order;
}

echo memory_get_peak_usage() . PHP_EOL;
