<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets\Services;

class GuzzleHttpAdapter implements HttpAdapter
{
    public function post(string $url, array $data = []): void
    {
        echo 'Does request to register budget in the API with guzzle' . PHP_EOL;
        echo PHP_EOL;
    }
}
