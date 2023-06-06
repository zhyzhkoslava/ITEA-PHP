<?php

//spl_autoload_register(function($className) {
//    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
//    $path = __DIR__ . "/classes/{$className}.php";
//    if (is_readable($path))
//    {
//        require $path;
//    }
//});

//$BMW = new BMW(50);
//$BMW->start();
//$driver = new Driver('Kyiv', 'Lviv');
//$BMW->up(20);
//$BMW->down(10);
//echo $BMW::getCount();
//$driver->drive($BMW);

spl_autoload_register(function($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $path = __DIR__ . "/logger/{$className}.php";
    if (is_readable($path))
    {
        require $path;
    }
});

require __DIR__ . '/../vendor/psr/log/src/LoggerInterface.php';
require __DIR__ . '/../vendor/psr/log/src/LogLevel.php';

$formater = new StringFormatter();
$writer = new FileWriter($formater);
$logger = new Logger(__DIR__.'/logs/log.txt', $writer);

$app = new Application(
    new Db(),
    $logger
);

$app->run();
