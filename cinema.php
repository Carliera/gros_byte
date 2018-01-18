<?php
header('Content-Type: application/json');
$json = ["name" => "Les Gros Byte"];
$json = json_encode($json);
echo $json;

exit;
?>