<?php

use App\Items\DefaultItem;
use App\Services\ItemFactory;

beforeEach(function () {
    // arrange
    $this->type = 'perishable';
    $this->name = 'Hat';
    $this->value = 10;
    $this->sellIn = 5;

    $this->factory = new ItemFactory();
    $this->factory->register($this->type, DefaultItem::class);
});

it('decreases value by 1 when sellIn has not passed', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, $this->sellIn);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 9,
    ]);
});

it('decreases value by 2 when sellIn has passed', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, 0);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 8,
    ]);
});

it('does not decrease value below zero', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, 1, 0);

    // act
    $result = $item->ageByOneDay();
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 0,
    ]);
});

it('starts with immediate reduction of 2 when sellIn is zero', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, 0);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 8,
    ]);
});

it('tracks days aged correctly', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, 10, 3);

    // act
    $item->ageByOneDay();
    $item->ageByOneDay();
    // $item->ageByOneDay();
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 7,
    ]);
});
