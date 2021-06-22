<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Logs;

class StdoutLogManager extends LogManager
{
    public function createLogWriter(): LogWriter
    {
        return new StdoutLogWriter();
    }
}
