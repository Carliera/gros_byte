<?php
header('Content-Type: application/json');

$json = [0 => ["id" => 423, "name" => "Star Wars : Le reveil de la force"], 1 => ["id" => 424, "name" => "Les Cookies"], 2=>["id"=>425, "name" => "Megashark vs M.Lamperier"]];
$json = json_encode($json);

echo $json;

exit;
?>