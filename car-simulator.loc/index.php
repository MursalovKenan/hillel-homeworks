<?php

use Classes\Car;
use Classes\Driver;
use Classes\RodoCar;
use Classes\SportCar;

require 'autoloader.php';
RodoCar::setCountry(Car::COUNTRY_AUTOGOT);
$roboCar = new RodoCar('optimus prime', 300);
$roboCar->transform();

$cars = [
    new SportCar('ferari', 300),
    new SportCar('samopal', 12),
    new RodoCar('polly', 160),
    $roboCar
];

foreach ($cars as $car) {
    Driver::simulateDrive($car);
}
echo $roboCar->getName() . ' from ' . $roboCar::getCountry() . PHP_EOL;