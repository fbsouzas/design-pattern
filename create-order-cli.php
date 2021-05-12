<?php

use Fbsouzas\DesignPattern\Orders\GeneratesOrder\GeneratesOrder;

require 'vendor/autoload.php';

$budgetValue = $argv[1];
$quantityItems = $argv[2];
$clientName = $argv[3];

$generateOrder = new GeneratesOrder($budgetValue, $quantityItems, $clientName);
$generateOrder->execute();
