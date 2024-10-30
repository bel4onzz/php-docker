<?php

namespace App\Items;

use App\Contracts\ItemInterface;

class PerishableItem implements ItemInterface
{
    private array $agedByDays;

    public function __construct(private string $name, private int $value, private int $sellIn)
    {
        $this->agedByDays[$name] = 0;
    }

    public function ageByOneDay(): array
    {
        $aged = $this->agedByDays[$this->name];
        $this->agedByDays[$this->name] += 1;
        
        if ($aged >= $this->sellIn) {

            $this->value = ($this->value - 4) > 0 ? $this->value - 4 : 0;
            return [
                'name' => $this->name,
                'value' => $this->value
            ];
        }

        $this->value = ($this->value - 2) > 0 ? $this->value - 2 : 0;
        return [
            'name' => $this->name,
            'value' => $this->value
        ];
    }
}
