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
    $bd = new PDO("mysql:host=localhost;dbname=nightcode-simple","root","root");
    /////////////////////////////////////////
    //L'indice peux être changé selon le nom du fichier json envoyé
        if(!isset($_POST["name"]))
        {
            http_response_code(400);
        }
        else
        {
            $reqPrepare = $bd->exec("INSERT INTO movies (Title) VALUES $_POST[name]");
            $query = $bd->query("SELECT IDMovie FROM movies WHERE Title = \"$_POST[name]\"");
            $results = $query->fetch(PDO::FETCH_ASSOC);
            echo $results["IDMovie"];
            echo $_POST["name"];
        }

}

exit;
?>