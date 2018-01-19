<?php
header('Content-Type: application/json');
$bd = new PDO("mysql:host=localhost;dbname=nightcode","root","root");

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(!isset($_GET["id"])){
        $json = [0 => ["id" => 423, "name" => "Star Wars : Le reveil de la force"], 1 => ["id" => 424, "name" => "Les Cookies"], 2=>["id"=>425, "name" => "Megashark vs M.Lamperier"]];
        $json = json_encode($json);
            
        echo $json;
    }
    else{
        
        $requete = $bd->prepare("SELECT * FROM movies WHERE IDMovie = ".$_GET["id"]);
        $requete->execute();
        $result = $requete->fetch(PDO::FETCH_ASSOC);
        if($requete->rowcount() != 0) {
            $res = json_encode( ["name" => $result["title"]]);
            echo $res;
        }
        else http_response_code(400);
    }

}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    /////////////////////////////////////////
    //L'indice peux être changé selon le nom du fichier json envoyé
    $post = file_get_contents('php://input');
    $postDecoded = json_decode($post);
        if(!isset($postDecoded["name"]))
        {
            http_response_code(400);
        }
        else
        {
            $reqPrepare = $bd->prepare("INSERT INTO movies (title) VALUES (:title)");
            $result = $reqPrepare->execute(array("title" => $postDecoded["name"]));
            $res = ["id" => $bd->lastInsertId(), "name" => $postDecoded["name"]];
            $res = json_encode($res);
            echo $res;
        }

}

exit;
?>