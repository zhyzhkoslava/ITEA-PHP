<?php

require __DIR__ . '/../vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://itea.ua');

if ($response->getStatusCode() == 200){
    echo $response->getBody();
}