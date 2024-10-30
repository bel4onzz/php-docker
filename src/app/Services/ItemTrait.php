<?php

namespace App\Services;

use App\Items\GoldBar;
use App\Items\DefaultItem;
use App\Items\PerishableItem;
use App\Items\WorldCupTicket;
use App\Items\VintageVineItem;
use App\Services\ItemFactory;

trait ItemTrait
{
    private array $items = [
        [
            'type' => 'default',
            'class' => DefaultItem::class,
            'name' => 'Hat',
            'value' => 10,
            'sellIn' => 7
        ],
        [
            'type' => 'default',
            'class' => DefaultItem::class,
            'name' => 'Frying Pan',
            'value' => 10,
            'sellIn' => 4
        ],
        [
            'type' => 'vintage-vine',
            'class' => VintageVineItem::class,
            'name' => 'Vintage Wine',
            'value' => 32,
            'sellIn' => 0
        ],
        [
            'type' => 'world-cup-ticket',
            'class' => WorldCupTicket::class,
            'name' => 'World Cup Tickets',
            'value' => 10,
            'sellIn' => 8
        ],
        [
            'type' => 'perishable',
            'class' => PerishableItem::class,
            'name' => 'Milk',
            'value' => 10,
            'sellIn' => 7
        ],
        [
            'type' => 'gold-bar',
            'class' => GoldBar::class,
            'name' => 'Gold Bar',
            'value' => 80,
            'sellIn' => 0
        ],
    ];
    private array $response = [];

    protected function createItems(): array
    {
        $factory = new ItemFactory();
        foreach ($this->items as $item) {

            $factory->register($item['type'], $item['class']);
        }

        foreach ($this->items as $item) {

            array_push($this->response, $factory->create($item['type'], $item['name'], $item['value'], $item['sellIn']));
        }


        return $this->response;
    }
}
