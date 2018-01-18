<?php

$json = file_get_contents("name.json");
var_dump(json_decode($json));
?>