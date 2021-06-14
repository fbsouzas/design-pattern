<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Budgets\Services;

interface HttpAdapter
{
    public function post(string $url, array $data = []): void;
}
