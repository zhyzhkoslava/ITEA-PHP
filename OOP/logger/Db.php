<?php

use src\DbInterface;

class Db implements DbInterface
{
    public function select()
    {
        echo 'Db class select method!' . PHP_EOL;
    }
}