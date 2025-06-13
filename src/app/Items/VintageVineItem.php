<?php

namespace App\Items;

use App\Contracts\ItemInterface;

class VintageVineItem implements ItemInterface
{    
    /**
     * __construct
     *
     * @param  string $name
     * @param  int $value
     * @param  int $sellIn
     * @return void
     */
    public function __construct(private string $name, private int $value, private int $sellIn) {}
    
    /**
     * ageByOneDay
     *
     * @return array
     */
    public function ageByOneDay(): array
    {
        $this->value = ($this->value + 2) > 50 ? 50 : $this->value + 2;

        return [
            'name' => $this->name,
            'value' => $this->value
        ];
    }
}
