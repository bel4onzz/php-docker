<?php

namespace App\Items;

use App\Contracts\ItemInterface;

class VintageVineItem implements ItemInterface
{
    public function __construct(private string $name, private int $value, private int $sellIn) {}

    public function ageByOneDay(): array
    {
        $this->value = ($this->value + 2) > 50 ? 50 : $this->value + 2;

        return [
            'name' => $this->name,
            'value' => $this->value
        ];
    }
}
