<?php

use App\Items\PerishableItem;
use App\Services\ItemFactory;

beforeEach(function () {
    // arrange
    $this->type = 'perishable';
    $this->name = 'Hat';
    $this->value = 10;
    $this->sellIn = 5;

    $this->factory = new ItemFactory();
    $this->factory->register($this->type, PerishableItem::class);
});

it('decreases value by 2 when sellIn has not passed', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, $this->sellIn);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 8,
    ]);
});

it('decreases value by 4 when sellIn has passed', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, 0);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 6,
    ]);
});


it('ensures value does not drop below zero', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, 0);

    // act
    $item->ageByOneDay();
    $item->ageByOneDay();
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 0,
    ]);
});

it('starts with immediate reduction of 4 when sellIn is zero', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, 5, 0);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 1,
    ]);
});
