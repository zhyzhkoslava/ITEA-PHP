<?php


use src\FormatInterface;
use src\WriterInterface;

class FileWriter implements WriterInterface
{
    public $formater;
    public $filename;

    public function __construct(string $filename, FormatInterface $formater)
    {
        $this->filename = $filename;
        $this->formater = $formater;
    }

    public function write($level, $message)
    {
        file_put_contents($this->filename, $this->formater->format($level, $message), FILE_APPEND);
    }
}