<?php
namespace Classes;

abstract class Car implements MovableInterface
{
    private static string $country;
    private int $speed;
    private int $maxSpeed;
    private bool $isIgnitionOn;
    private string $name;
    public  const COUNTRY_BMV = 'Germany';
    public  const COUNTRY_FERRARI = 'Italy';
    public  const COUNTRY_ROBOCAR = 'USA';
    public  const COUNTRY_AUTOGOT = 'Megatron';

    public function __construct(string $name, int $maxSpeed)
    {
        if ($maxSpeed <= 0) {
            return null;
        }
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->speed = 0;
        $this->isIgnitionOn = false;
    }

    public static function getCountry(): mixed
    {
        return self::$country;
    }

    public static function setCountry(string $country): void
    {
        if (in_array($country,
        [
            self::COUNTRY_AUTOGOT,
            self::COUNTRY_BMV,
            self::COUNTRY_FERRARI,
            self::COUNTRY_ROBOCAR
        ]))
        {
            self::$country = $country;
        }
        else{
            die('Country not supported yat' . PHP_EOL);
        }
    }

    public function start(): bool
    {
        if ($this->isIgnitionOn) {
            return $this->isIgnitionOn;
        } else
            $this->isIgnitionOn = true;
        return $this->isIgnitionOn;
    }

    public function stop(): bool
    {
        if (!$this->isIgnitionOn) {
            return $this->isIgnitionOn;
        } else
            $this->isIgnitionOn = false;
        return $this->isIgnitionOn;
    }

    public function up(int $unit): string
    {
        if ($unit < 0) {
            return 'Speed cen`t be less then 0';
        }
        if (!$this->isIgnitionOn) {
            return 'ignition is off. start the car';
        }
        $currentSpeed = $this->speed + $unit;
        if ($currentSpeed <= $this->maxSpeed) {
            $this->speed = $currentSpeed;
        }
        return 'Current speed is ' . $this->speed;
    }

    public function down(int $unit): string
    {
        if ($unit < 0) {
            return 'Speed cen`t be less then 0';
        }
        if (!$this->isIgnitionOn) {
            return 'ignition is off. start the car';
        }
        $currentSpeed = $this->speed - $unit;
        if ($currentSpeed >= 0) {
            $this->speed = $currentSpeed;
        } else {
            $this->speed = 0;
        }
        return 'Current speed is ' . $this->speed;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}