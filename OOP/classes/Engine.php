<?php


class Engine
{
    protected $engine;

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
}