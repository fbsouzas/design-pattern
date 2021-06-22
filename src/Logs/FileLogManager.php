<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Logs;

class FileLogManager extends LogManager
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function createLogWriter(): LogWriter
    {
        return new FileLogWriter($this->filePath);
    }
}
