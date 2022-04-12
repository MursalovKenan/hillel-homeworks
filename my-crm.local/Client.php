<?php

namespace app;

class Client
{
    private $firstName;
    private $lastMame;
    private $phone;

    public function __construct($firstName, $lastName, $phone)
    {
        $this->firstName = $firstName;
        $this->lastMame = $lastName;
        $this->phone = $phone;
    }

    public function printInfo()
    {
        echo 'first name is ' . $this->firstName . PHP_EOL;
        echo 'last name is ' . $this->lastMame . PHP_EOL;
        echo 'Phone is ' . $this->phone;
    }

}