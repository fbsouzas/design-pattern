<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Items;

class ItemCacheProxy extends Item
{
    private Item $item;
    private array $cached;

    public function __construct(Item $item)
    {
        $this->item = $item;
        $this->cached = [];
    }

    public function value(): float
    {
        $key = "item_{$this->item->code()}";

        // The item value could be saved in the Redis, for example.
        if (!array_key_exists($key, $this->cached)) {
            $this->cached[$key] = $this->item->value();
        }

        return $this->cached[$key];
    }

    public function quantityOfItems(): int
    {
        return $this->item->quantityOfItems();
    }

    public function test()
    {
        return $this->cached;
    }
}
