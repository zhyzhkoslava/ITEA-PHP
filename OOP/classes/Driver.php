<?php

use src\MovableInterface;


class Driver
{

    protected $from;
    protected $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function drive(MovableInterface $movable)
    {
        $movable->move($this->from, $this->to);
    }
}