<?php

namespace Classes;

class SportCar extends Car
{
    const MIN_SPEED = 220;

    public function __construct(string $name, int $maxSpeed)
    {
        if ($maxSpeed < self::MIN_SPEED) {
            echo $name . ': Sport car can be faster' . PHP_EOL;
            echo 'We defined it to ' . self::MIN_SPEED . PHP_EOL;
            parent::__construct($name, self::MIN_SPEED);
            return;
        }
        parent::__construct($name, $maxSpeed);
    }
}