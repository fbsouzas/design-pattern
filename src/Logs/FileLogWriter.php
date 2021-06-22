<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Logs;

class FileLogWriter implements LogWriter
{
    private $file;

    public function __construct(string $filePath)
    {
        $this->file = fopen($filePath, 'a+');
    }

    public function log(string $formattedMessage): void
    {
        fwrite($this->file, $formattedMessage . PHP_EOL);
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}
