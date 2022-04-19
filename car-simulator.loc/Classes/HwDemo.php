<?php

namespace Classes;

use Classes\Exception\IncorrectFuelTypeException;
use Classes\Exception\SpeedLimitException;

class HwDemo
{
    public static function showComposItIob(): string
    {
        $info = 'show composition#######################################' . PHP_EOL;
        $truck = new Truck('Mercedes-Benz Sprinter', '200', Engine::FUEL_DIESEL, '345');
        $fuel = $truck->getEngine()->getFuelType();
        $info .= 'Truck fuel is ' . $fuel . PHP_EOL;
        return $info;
    }

    public static function showAggregation(): string
    {
        $info = 'show aggregation#######################################' . PHP_EOL;
        $batery = new Battery('Bosch 60Аh', '60');
        $brokenTruck = new Truck('Mercedes-Benz Sprinter', '200', Engine::FUEL_DIESEL, '345');
        $brokenTruck->setBattery($batery);
        $info .= 'Battery inside ' . $brokenTruck->getBrand() . PHP_EOL;
        $info .= Battery::batteryInfo($brokenTruck->getBattery()) . PHP_EOL;
        unset($brokenTruck);
        $Truck = new Truck('Mercedes-Benz Sprinter', '200', Engine::FUEL_DIESEL, '345');
        $Truck->setBattery($batery);
        $info .= 'Battery inside ' . $Truck->getBrand() . PHP_EOL;
        $info .= Battery::batteryInfo($Truck->getBattery()) . PHP_EOL;
        return $info;
    }

    public static function driveTheCar(): string
    {
        $cars = [];
        try {
            $robocar = new Robocar('optimus prime', 300);
            $robocar->transform();
            $cars = [
                new SportCar('ferrari', 500),
                new SportCar('samopal', 12),
                new Robocar('polly', 160),
                new Truck('Mercedes', 259),
                $robocar
            ];
        } catch (IncorrectFuelTypeException|SpeedLimitException $e) {
            $info = $e->getMessage();
        }
        $driver = new Driver('Шумахер');
        foreach ($cars as $car) {
            $info .= $driver->drive($car);
        }
        return $info;
    }

    public static function testException()
    {
        try {
            return new Engine('soda');
        }catch (IncorrectFuelTypeException $ex){
            return $ex->getMessage();
        }
    }
}