<?php

namespace Classes;

class Truck extends Car
{
    private int $carrying;

    public function __construct(string $brand,
                                int $maxSpeed,
                                string $fuelType = Engine::FUEL_DIESEL,
                                int $carrying = 100)
    {
        $this->carrying = $carrying;
        parent::__construct($brand, $maxSpeed, $fuelType);
    }

    /**
     * @return int
     */
    public function getCarrying(): int
    {
        return $this->carrying;
    }


}