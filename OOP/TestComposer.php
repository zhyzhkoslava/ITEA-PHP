<?php

require __DIR__ . '/../vendor/autoload.php';

$dd = new \Zhyzhkoslava\SimpleLaravelDumper\DD();

$client = new \GuzzleHttp\Client();
$dd->dd($client);
$response = $client->request('GET', 'https://itea.ua');

if ($response->getStatusCode() == 200){
    echo $response->getBody();
}