<?php
namespace Classes;

class Driver
{
    public static function simulateDrive(MovableInterface $car)
    {
        echo '###################################' . PHP_EOL;

        if (!$car->start()) {
            echo $car->getName() . ' can`t start' . PHP_EOL;
            return;
        }
        echo 'Run the car ' . $car->getName() . PHP_EOL;
        for ($i = 0; $i < rand(5, 10); $i++) {
            $unit = rand(1, 100);
            if (rand(0, 2)) {
                echo 'Speed up unit = ' . $unit . PHP_EOL;
                echo $car->up($unit) . PHP_EOL;
            } else {
                echo 'Speed down unit = ' . $unit . PHP_EOL;
                echo $car->down($unit) . PHP_EOL;
            }
        }
    }
}