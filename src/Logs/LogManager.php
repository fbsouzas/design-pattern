<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Logs;

abstract class LogManager
{
    public function log(string $severity, string $message): void
    {
        $logWriter = $this->createLogWriter();
        $currentDate = date('Y-m-d H:i:s');
        $severityToUpper = strtoupper($severity);
        $formattedMessage = "[{$currentDate}] {$severityToUpper}: {$message}";

        $logWriter->log($formattedMessage);
    }

    abstract public function createLogWriter(): LogWriter;
}
