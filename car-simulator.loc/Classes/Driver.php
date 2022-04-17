<?php

namespace Classes;

class Driver
{
    private string $mane;

    /**
     * @param string $mane
     */
    public function __construct(string $mane)
    {
        $this->mane = $mane;
    }


    public function drive(MovableInterface $car)
    {
        $driveInfo = '###################################' . PHP_EOL;

        if (!$car->start()) {
            $driveInfo .= $car->getBrand() . ' can`t start' . PHP_EOL;
            return $driveInfo;
        }
        $driveInfo .= 'Run the car ' . $car->getBrand() . PHP_EOL;
        for ($i = 0; $i < rand(5, 10); $i++) {
            $unit = rand(1, 100);
            if (rand(0, 2)) {
                $driveInfo .= 'Speed up unit = ' . $unit . PHP_EOL;
                $driveInfo .= $car->up($unit) . PHP_EOL;
            } else {
                $driveInfo .= 'Speed down unit = ' . $unit . PHP_EOL;
                $driveInfo .= $car->down($unit) . PHP_EOL;
            }
        }
        $car->stop();
        return $driveInfo;
    }

    /**
     * @return string
     */
    public function getMane(): string
    {
        return $this->mane;
    }


}