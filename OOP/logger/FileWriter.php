<?php


use src\FormatInterface;
use src\WriterInterface;

class FileWriter implements WriterInterface
{
    public $formater;

    public function __construct(FormatInterface $formater)
    {
        $this->formater = $formater;
    }

    public function write($filename, $message)
    {
        file_put_contents($filename, $message, FILE_APPEND);
    }
}