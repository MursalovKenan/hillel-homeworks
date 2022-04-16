<?php

namespace Classes;

use Classes\Exception\IncorrectFuelTypeException;

class Engine
{
    public const FUEL_PETROL = 'petrol';
    public const FUEL_DIESEL = 'diesel';
    public const FUEL_GAS = 'gas';
    public const FUEL_ELECTRICITY = 'electricity';
    private string $fuelType;

    /**
     * @throws IncorrectFuelTypeException
     */
    public function __construct($fuelType)
    {
        if (in_array($fuelType, [
            self::FUEL_DIESEL,
            self::FUEL_ELECTRICITY,
            self::FUEL_GAS,
            self::FUEL_PETROL,
        ])) {
            $this->fuelType = $fuelType;
        } else {
            throw new IncorrectFuelTypeException('This fuel type don`t supported yet');
        }


    }

    /**
     * @return string
     */
    public function getFuelType(): string
    {
        return $this->fuelType;
    }
}