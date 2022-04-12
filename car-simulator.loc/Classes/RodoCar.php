<?php

namespace Classes;

class RodoCar extends Car
{
    private bool $isCar;

    public function __construct(string $name, int $maxSpeed)
    {
        parent::__construct($name, $maxSpeed);
        $this->isCar = false;
    }

    public function transform()
    {
        $this->isCar = !$this->isCar;
    }

    public function start(): bool
    {
        if ($this->isCar) {
            return parent::start();
        }
        return false;
    }

    public function stop(): bool
    {
        if ($this->isCar) {
            return parent::stop();
        }
        return false;
    }

    public function up(int $unit): string
    {
        if ($this->isCar) {
            return parent::up($unit);
        }
        return 'Naw I`m not a car';
    }

    public function down(int $unit): string
    {
        if ($this->isCar) {
            return parent::up($unit);
        }
        return 'Naw I`m not a car';
    }
}