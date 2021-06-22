<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Logs;

class StdoutLogWriter implements LogWriter
{
    public function log(string $formattedMessage): void
    {
        echo $formattedMessage . PHP_EOL;
    }
}
