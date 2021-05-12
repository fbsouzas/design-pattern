<?php

use Fbsouzas\DesignPattern\Orders\GeneratesOrder\GeneratesOrderCommand;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\GeneratesOrderHandler;

require 'vendor/autoload.php';

$budgetValue = $argv[1];
$quantityItems = $argv[2];
$clientName = $argv[3];

$generateOrderCommand = new GeneratesOrderCommand($budgetValue, $quantityItems, $clientName);
$generateOrderHandler = new GeneratesOrderHandler();
$generateOrderHandler->execute($generateOrderCommand);
