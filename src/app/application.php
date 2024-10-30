<?php

namespace App;

use App\Services\ItemService;

$itemsObj = new ItemService();
$items = $itemsObj->getItems();

echo '<div style="float: left; width: 45%">';
for ($i = 0; $i < 10; $i++) {

    echo '<p><strong>DAY ' . $i . "</strong></p>";
    foreach ($items as $item) {
        $response = $itemsObj->ageItem($item);
        echo $response['name'] . ': ' . $response['value'] . "<br>";
    }
    echo "<hr>";
}
echo "</div>";

use App\InventoryItem;

$items = [
    new InventoryItem('Hat', 10, 7),
    new InventoryItem('Frying Pan', 10, 4),
    new InventoryItem('Vintage Wine', 32, 0),
    new InventoryItem('World Cup Tickets', 10, 8),
    new InventoryItem('Milk', 10, 7),
    //new InventoryItem('Gold Bar', 80, 0) not implemented yet
];

echo '<div style="float: right; width: 45%">';
for ($i = 0; $i < 10; $i++) {
    echo '<p><strong>DAY ' . $i . "</strong></p>";
    foreach ($items as $item) {
        $item->ageByOneDay();
        echo $item->name() . ': ' . $item->value() . "<br>";
    }
    echo "<hr>";
}
echo "</div>";
