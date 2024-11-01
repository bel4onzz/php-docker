<?php

namespace App\Contracts;

interface ItemInterface
{    
    /**
     * ageByOneDay
     *
     * @return array
     */
    public function ageByOneDay(): array;
}
