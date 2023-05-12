<?php

spl_autoload_register(function($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $path = __DIR__ . "/classes/{$className}.php";
    if (is_readable($path))
    {
        require $path;
    }
});

$BMW = new BMW(50);
$BMW->start();
$BMW->up(20);
$BMW->down(10);
echo $BMW::getCount();

$GMC = new GMC(20);
$GMC->start();
$GMC->up(20);
$GMC->down(10);
echo $GMC::getCount();
