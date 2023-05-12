<?php

namespace src;

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
        return ($speed + $unit) > $this->getMaxSpeed();
    }

    public function checkMinSpeed(int $speed, int $unit): bool
    {
        return ($speed - $unit) < 0;
    }
}