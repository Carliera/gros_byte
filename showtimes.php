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
        
        $requete = $bd->query("SELECT * FROM movie");
        $result = $requete->fetch(PDO::FETCH_ASSOC);
        if($result["IDMovie"] == $GET["id"]){
            $res = json_encode( ["name" => $result["title"]]);
        }
        else http_response_code(400);
        echo $res;
    }

}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    /////////////////////////////////////////
    //L'indice peux être changé selon le nom du fichier json envoyé
        if(!isset($_POST["name"]))
        {
            http_response_code(400);
        }
        else
        {
            $reqPrepare = $bd->prepare("INSERT INTO movies (title) VALUES (:title)");
            $result = $reqPrepare->execute(array("title" => $_POST["name"]));
            $res = ["id" => $bd->lastInsertId(), "name" => $_POST["name"]];
            $res = json_encode($res);
            echo $res;
        }

}

exit;
?>