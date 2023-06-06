<?php


namespace src;


interface WriterInterface
{
    public function write(string $filename, string $message);
}