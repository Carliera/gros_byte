<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://80.211.175.238/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);

$response = $client->request('GET', 'theater');
$data = json_decode($response->getBody());

echo $data->name;//->read(1024);
?>
