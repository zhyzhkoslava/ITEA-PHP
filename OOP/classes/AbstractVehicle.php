<?php

namespace OOP\classes;


class AbstractVehicle
{
    protected $engine;
    protected $speed = 0;
    protected $maxSpeed;

    public function __construct(int $maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;
    }

    public function isEngineRunning()
    {
        return $this->engine;
    }

    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    public function checkMaxSpeed(int $speed, int $unit): bool
    {
        if ( ($speed + $unit) > $this->getMaxSpeed() )
        {
            return false;
        } else
            return true;
    }

    public function checkMinSpeed(int $speed, int $unit): bool
    {
        if ( ($speed - $unit) < 0 )
        {
            return false;
        } else
            return true;
    }
}