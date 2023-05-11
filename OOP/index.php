<?php

use OOP\classes\BMW;
use OOP\classes\GMC;

spl_autoload_register(function($className) {
    $segments = explode('\\', $className);
    $filemane =  __DIR__ . '/classes/' . $segments[count($segments) - 1] . '.php';
    if (file_exists($filemane))
    {
        require_once $filemane;
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
