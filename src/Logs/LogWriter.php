<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Logs;

interface LogWriter
{
    public function log(string $formattedMessage): void;
}
