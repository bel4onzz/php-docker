<?php

namespace App\Services;

use App\Contracts\ItemInterface;

class ItemService
{
    use ItemTrait;

    public function getItems(): array
    {
        return $this->createItems();
    }
    public function ageItem(ItemInterface $item): array
    {
        $agedItem = $item->ageByOneDay();

        return $agedItem;
    }
}
