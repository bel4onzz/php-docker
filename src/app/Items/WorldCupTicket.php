<?php

namespace App\Items;

use App\Contracts\ItemInterface;

class WorldCupTicket implements ItemInterface
{
    private array $agedByDays;
    
    /**
     * __construct
     *
     * @param  string $name
     * @param  int $value
     * @param  int $sellIn
     * @return void
     */
    public function __construct(private string $name, private int $value, private int $sellIn)
    {
        $this->agedByDays[$name] = 0;
    }
    
    /**
     * ageByOneDay
     *
     * @return array
     */
    public function ageByOneDay(): array
    {
        $daysLeft = $this->sellIn - $this->agedByDays[$this->name];
        $this->agedByDays[$this->name] += 1;

        if ($daysLeft <= 0) {

            $this->value = 0;
            return [
                'name' => $this->name,
                'value' => $this->value
            ];
        }

        if ($daysLeft > 10) {

            $this->value = ($this->value + 1) > 50 ? 50 : $this->value + 1;
            return [
                'name' => $this->name,
                'value' => $this->value
            ];
        }

        if ($daysLeft >= 6 && $daysLeft <= 10) {

            $this->value = ($this->value + 2) > 50 ? 50 : $this->value + 2;
            return [
                'name' => $this->name,
                'value' => $this->value
            ];
        }

        $this->value = ($this->value + 3) > 50 ? 50 : $this->value + 3;
        return [
            'name' => $this->name,
            'value' => $this->value
        ];
    }
}
