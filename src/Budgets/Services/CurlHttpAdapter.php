<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets\Services;

class CurlHttpAdapter implements HttpAdapter
{
    public function post(string $url, array $data = []): void
    {
        echo 'Does request to register budget int API with curl' . PHP_EOL;
        echo PHP_EOL;
    }
}
