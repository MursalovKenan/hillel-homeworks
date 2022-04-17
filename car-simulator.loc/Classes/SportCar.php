<?php

namespace Classes;

class SportCar extends Car
{
    const MIN_SPEED = 220;

    public function __construct(string $brand, int $maxSpeed)
    {
        if ($maxSpeed < self::MIN_SPEED) {
            echo $brand . ': Sport car can be faster' . PHP_EOL;
            echo 'We defined it to ' . self::MIN_SPEED . PHP_EOL;
            parent::__construct($brand, self::MIN_SPEED);
            return;
        }
        parent::__construct($brand, $maxSpeed);
    }
}