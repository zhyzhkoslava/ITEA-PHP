<?php


use src\FormatInterface;

class StringFormatter implements FormatInterface
{

    public function format($level, $message)
    {
        return date("d-m-Y h:i:sa") . ' : ' . $level . ' : ' . $message . PHP_EOL;
    }
}