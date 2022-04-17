<?php

use GuzzleHttp\Client;

include __DIR__ . '/vendor/autoload.php';

$client = new Client();
try {
    $response = $client->get('https://stackoverflow.com/');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    $e->getMessage();
}
var_dump($response->getBody()->getContents());

