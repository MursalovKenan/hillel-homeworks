<?php

use Classes\Car;
use Classes\Driver;
use Classes\Engine;
use Classes\RodoCar;
use Classes\SportCar;
use Classes\Truck;

require 'autoloader.php';
RodoCar::setCountry(Car::COUNTRY_AUTOBOT);
$roboCar = new RodoCar('optimus prime', 300);
$roboCar->transform();

try {
    $cars = [
        new SportCar('ferari', 300),
        new SportCar('samopal', 12),
        new RodoCar('polly', 160),
        $roboCar
    ];
} catch (\Classes\Exception\IncorrectFuelTypeException|\Classes\Exception\SpeedLimitException $e) {
    echo $e->getMessage();
}

foreach ($cars as $car) {
    Driver::simulateDrive($car);
}
echo $roboCar->getBrand() . ' from ' . $roboCar::getCountry() . PHP_EOL;

echo 'show composition#######################################' . PHP_EOL;
$truck = new Truck('Mercedes-Benz Sprinter' , '200', Engine::FUEL_DIESEL, '345');
$fuel = $truck->getEngine()->getFuelType();
echo 'Truck fuel is ' . $fuel . PHP_EOL;