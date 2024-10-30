<?php

use App\Services\ItemFactory;
use App\Items\VintageVineItem;

beforeEach(function () {
    // arrange
    $this->type = 'vintage-vine';
    $this->name = 'Hat';
    $this->value = 10;
    $this->sellIn = 5;

    $this->factory = new ItemFactory();
    $this->factory->register($this->type, VintageVineItem::class);
});

it('increases value by 2 each day', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, $this->sellIn);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 12,
    ]);
});

it('does not exceed a maximum value of 50', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, 49, $this->sellIn);

    // act
    $item->ageByOneDay();
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 50,
    ]);
});

it('does not increase value when starting at 50', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, 50, $this->sellIn);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 50,
    ]);
});
