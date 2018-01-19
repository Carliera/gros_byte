<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://80.211.175.238/',
    'timeout'  => 2.0,
]);

if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
  $response = $client->request('POST', 'http://80.211.175.238', [
    'form_params' => [
        'name' => $_POST['prenom']
        ]
    ]);
  header('Location: seances.php');
}
else {
  header('Location: addseance.php?error=null_or_empty');
}


 ?>
