<?php
header('Content-Type: application/json');
$json = [0 => ["id" => 423], 1 => ["id" => 424], 2=>["id"=>425]];
$json = json_encode($json);

echo $json;

exit;
?>