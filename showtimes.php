<?php
header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"] == "GET")
{
$json = [0 => ["id" => 423, "name" => "Star Wars : Le reveil de la force"], 1 => ["id" => 424, "name" => "Les Cookies"], 2=>["id"=>425, "name" => "Megashark vs M.Lamperier"]];
$json = json_encode($json);

echo $json;
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Connexion à la BD
    //
    /////////////////////////////////////////
    //L'indice peux être changé selon le nom du fichier json envoyé
    $json = json_decode($_POST["json"]);
    if(empty($json["name"]))
    {
        trigger_error("name non présent",E_USER_ERROR);
    }
    else
    {
        //Test
        echo "OK";
    }
}
exit;
?>