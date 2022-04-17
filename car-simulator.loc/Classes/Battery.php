<?php

namespace Classes;

class Battery
{
    private string $name;
    private int $capacity;

    /**
     * @param string $name
     * @param int $capacity
     */
    public function __construct(string $name, int $capacity)
    {
        $this->name = $name;
        $this->capacity = $capacity;
    }

    public static function batteryInfo(\Classes\Battery $battery): string
    {
        $info = 'Name:' . $battery->getName() . PHP_EOL;
        $info .= 'Capacity:' . $battery->getCapacity() . PHP_EOL;
        return $info;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }
}