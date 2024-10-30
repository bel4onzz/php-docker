<?php

namespace App\Items;

use App\Contracts\ItemInterface;

class GoldBar implements ItemInterface
{
    public function __construct(private string $name, private int $value, private int $sellIn) {}

    public function ageByOneDay(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value
        ];
    }
}
