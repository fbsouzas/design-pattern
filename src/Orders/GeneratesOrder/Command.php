<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Orders\GeneratesOrder;

interface Command
{
    public function execute(): void;
}
