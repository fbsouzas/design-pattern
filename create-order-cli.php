<?php

use Fbsouzas\DesignPattern\Budgets\Budget;
use Fbsouzas\DesignPattern\Items\Item;
use Fbsouzas\DesignPattern\Items\ItemCacheProxy;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions\GeneratesOrderLog;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions\SaveOrderOnDB;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\Actions\SendTheOrderByEmail;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\GeneratesOrderCommand;
use Fbsouzas\DesignPattern\Orders\GeneratesOrder\GeneratesOrderHandler;

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

$budget = new Budget();
$budget->addItem($item500);
$budget->addItem($item300);
$budget->addItem($oldBudget);
$budget->approve();

$generateOrderCommand = new GeneratesOrderCommand($budget, 'Fabio Souza');
$generateOrderHandler = new GeneratesOrderHandler();
$generateOrderHandler->addAction(new SaveOrderOnDB());
$generateOrderHandler->addAction(new SendTheOrderByEmail());
$generateOrderHandler->addAction(new GeneratesOrderLog());
$generateOrderHandler->execute($generateOrderCommand);
