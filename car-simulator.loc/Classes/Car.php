<?php

namespace Classes;

use Classes\Exception\SpeedLimitException;

abstract class Car implements MovableInterface
{
    public const COUNTRY_BMV = 'Germany';
    public const COUNTRY_FERRARI = 'Italy';
    public const COUNTRY_ROBOCAR = 'USA';
    public const COUNTRY_AUTOBOT = 'Megatron';
    private static string $country;
    private int $speed;
    private int $maxSpeed;
    private bool $isIgnitionOn;
    private string $brand;
    private Engine $engine;
    private Battery $battery;

    /**
     * @throws SpeedLimitException
     * @throws Exception\IncorrectFuelTypeException
     */
    public function __construct(string $brand, int $maxSpeed, string $fuelType = Engine::FUEL_DIESEL)
    {
        if ($maxSpeed < 0) {
            throw new SpeedLimitException('Speed can`t be less then 0');
        }
        $this->brand = $brand;
        $this->maxSpeed = $maxSpeed;
        $this->speed = 0;
        $this->isIgnitionOn = false;
        $this->engine = new Engine($fuelType);
    }

    public static function getCountry(): string
    {
        return self::$country;
    }

    public static function setCountry(string $country): void
    {
        if (in_array($country,
            [
                self::COUNTRY_AUTOBOT,
                self::COUNTRY_BMV,
                self::COUNTRY_FERRARI,
                self::COUNTRY_ROBOCAR
            ])) {
            self::$country = $country;
        } else {
            die('Country not supported yat' . PHP_EOL);
        }
    }

    public function start(): bool
    {
        if (!$this->isIgnitionOn) {
            $this->isIgnitionOn = true;
        }
        return $this->isIgnitionOn;
    }

    public function stop(): bool
    {
        if ($this->isIgnitionOn) {
            $this->speed = 0;
            $this->isIgnitionOn = false;
        }
        return true;
    }

    /**
     * @throws SpeedLimitException
     */
    public function up(int $unit): string
    {
        if ($unit < 0) {
            throw new SpeedLimitException('Speed up unit can`t be less then 0');
        }
        if (!$this->isIgnitionOn) {
            return 'ignition is off. start the car';
        }
        $currentSpeed = $this->speed + $unit;
        if ($currentSpeed <= $this->maxSpeed) {
            $this->speed = $currentSpeed;
        } else {
            $this->speed = $this->maxSpeed;
        }
        return 'Current speed is ' . $this->speed;
    }

    /**
     * @throws SpeedLimitException
     */
    public function down(int $unit): string
    {
        if ($unit < 0) {
            throw new SpeedLimitException('Speed down unit can`t be less then 0');
        }
        if (!$this->isIgnitionOn) {
            return 'ignition is off. start the car';
        }
        $currentSpeed =  $this->speed - $unit;
        if ($currentSpeed >= 0) {
            $this->speed = $currentSpeed;
        } else {
            $this->speed = 0;
        }
        return 'Current speed is ' . $this->speed;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return Battery
     */
    public function getBattery(): Battery
    {
        return $this->battery;
    }

    /**
     * @param Battery $battery
     */
    public function setBattery(Battery $battery): void
    {
        $this->battery = $battery;
    }


}