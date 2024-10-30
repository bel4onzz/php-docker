<?php

namespace App\Services;

use App\Contracts\ItemInterface;
use Exception;

class ItemFactory
{
    private array $itemTypes = [];

    public function register(string $type, string $class): void
    {
        if (!is_subclass_of($class, ItemInterface::class)) {

            throw new Exception("Class $class must implement ItemInterface.");
        }

        if (!isset($this->itemTypes[$type])) {

            $this->itemTypes[$type] = $class;
        }
    }

    public function create(string $type, string $name, int $price, int $sellIn): ItemInterface
    {
        if (!isset($this->itemTypes[$type])) {

            throw new Exception("Item type '$type' is not registered.");
        }

        $class = $this->itemTypes[$type];
        return new $class($name, $price, $sellIn);
    }
}
