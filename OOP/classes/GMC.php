<?php

namespace OOP\classes;


class GMC extends AbstractVehicle implements MovableInterface
{
    const COUNTRY = 'USA';
    protected static $count;

    public function __construct($maxSpeed)
    {
        parent::__construct($maxSpeed);
        self::$count++;
    }

    public static function getCount()
    {
        return self::$count;
    }

    public function start()
    {
        $this->engine = true;
        echo 'Engine is running' . PHP_EOL;
    }

    public function stop()
    {
        $this->engine = false;
        echo 'Engine is stopped' . PHP_EOL;
    }

    public function up(int $unit)
    {
        if (!$this->isEngineRunning()) {
            echo 'Engine is not running' . PHP_EOL;
            return;
        }
        if (!$this->checkMaxSpeed($this->speed, $unit)) {
            echo 'MaxSpeed is exceeded' . PHP_EOL;
            return;
        }
        $this->speed += $unit;
        echo 'Current speed is ' . $this->speed . PHP_EOL;
    }

    public function down(int $unit)
    {
        if (!$this->isEngineRunning()) {
            echo 'Engine is not running' . PHP_EOL;
            return;
        }
        if (!$this->checkMinSpeed($this->speed, $unit)){
            echo 'MinSpeed is exceeded' . PHP_EOL;
            return;
        }
        $this->speed -= $unit;
        echo 'Current speed is ' . $this->speed . PHP_EOL;
    }
}