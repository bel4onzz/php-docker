<?php

use App\Items\WorldCupTicket;
use App\Services\ItemFactory;

beforeEach(function () {
    // arrange
    $this->type = 'world-cup-ticket';
    $this->name = 'World Cup Tickets';
    $this->value = 10;
    $this->sellIn = 8;

    $this->factory = new ItemFactory();
    $this->factory->register($this->type, WorldCupTicket::class);
});

it('increases value by 1 when there are more than 10 days left', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, 15);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 11,
    ]);
});

it('increases value by 2 when there are 6-10 days left', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, 10);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 12,
    ]);
});

it('increases value by 3 when there are 1-5 days left', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, 5);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 13,
    ]);
});

it('increases value by 3 when there is 1 day left', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, 1);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 13,
    ]);
});

it('drops value to 0 when the event has passed', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, 0);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 0,
    ]);
});

it('sets value to 0 immediately if starting with a negative sell-in value', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, $this->value, -1);

    // act
    $result = $item->ageByOneDay();

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 0,
    ]);
});

it('does not exceed maximum value of 50', function () {
    // arrange
    $item = $this->factory->create($this->type, $this->name, 49, $this->sellIn);

    // act
    for ($i = 0; $i < $this->sellIn; $i++) {
        $result = $item->ageByOneDay();
    }

    // assert/expect
    expect($result)->toMatchArray([
        'name' => $this->name,
        'value' => 50,
    ]);
});
