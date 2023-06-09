<?php

class TestIterator implements Iterator
{
    protected $file;
    protected $index;

    public function __construct($path_to_file)
    {
        $this->file = fopen($path_to_file, 'r');
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    public function current(): mixed
    {
        return fgets($this->file);
    }

    public function next(): void
    {
        $this->index++;
    }

    public function key(): mixed
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return !feof($this->file);
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}

$path = 'text.txt';
$test = new TestIterator($path);

foreach ($test as $key => $value)
{
    echo $key . ' : ' . $value . PHP_EOL;
}