<?php

namespace App\Services;

use App\Contracts\ItemInterface;

class ItemService
{
    use ItemTrait;

    /**
     * getItems
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->createItems();
    }

    /**
     * ageItem
     *
     * @param  ItemInterface $item
     * @return array
     */
    public function ageItem(ItemInterface $item): array
    {
        $agedItem = $item->ageByOneDay();

        return $agedItem;
    }
}
