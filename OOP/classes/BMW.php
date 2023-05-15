<?php


use src\AbstractVehicle;
use src\MovableInterface;

class BMW extends AbstractVehicle implements MovableInterface
{
    const COUNTRY = 'GERMANY';
    protected static $count;
    protected $engine;

    public function __construct($maxSpeed)
    {
        parent::__construct($maxSpeed);
        self::$count++;
        $this->engine = new Engine();
    }

    public static function getCount()
    {
        return self::$count . PHP_EOL;
    }

    public function start()
    {
        $this->engine->start();
    }

    public function stop()
    {
        $this->engine->stop();
    }

    public function up(int $unit)
    {
        if (!$this->isEngineRunning()) {
            echo 'Engine is not running' . PHP_EOL;
            return;
        }
        if ($this->checkMaxSpeed($this->speed, $unit) !== false) {
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
        if ($this->checkMinSpeed($this->speed, $unit) !== false){
            echo 'MinSpeed is exceeded' . PHP_EOL;
            return;
        }
        $this->speed -= $unit;
        echo 'Current speed is ' . $this->speed . PHP_EOL;
    }

    public function move(string $from, string $to)
    {
        if (!$this->isEngineRunning()) {
            echo 'Engine is not running' . PHP_EOL;
            return;
        }
        echo 'Moving from ' . $from . ' to ' . $to . PHP_EOL;
    }
}