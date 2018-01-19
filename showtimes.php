<?php
header('Content-Type: application/json');
$bd = new PDO("mysql:host=localhost;dbname=nightcode","root","root");

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(!isset($_GET["id"])){
        if(isset($_GET["res"])){
            $i=1;
            while($i != 50)
            {
                $requeteRes = $bd->prepare("INSERT INTO seat (available) VALUES (true) WHERE IDSeat = ".$i);
                $requeteSearch = $bd->prepare("SELECT available FROM seat WHERE IDSeat = ".$i);
                $requeteSearch->execute();
                $resSearch = $requeteSearch->fetch(PDO::FETCH_ASSOC);
                if($resSearch["available"] == true){
                    $requeteRes = $requete->execute(array("id" => $i));
                    break;
                }
                $i = $i +1;
            }
                           
        }
        else{

        $json = [0=>["id"=>4,"name" => "StarWars"],1=>["id"=>5,"name"=>"starwars2"]];
        $json = json_encode($json);
        echo $json;
    }
    }
    else{
        
        $requete = $bd->prepare("SELECT * FROM movies WHERE IDMovie = ".$_GET["id"]);
        $requete->execute();
        $result = $requete->fetch(PDO::FETCH_ASSOC);
        if($requete->rowcount() != 0) { 
            $tabSeat = array();
            for ($i=1; $i <= 5; $i++) { 
                for ($j=1; $j <= 10 ; $j++) { 
                    $tabSeat[] = ["id" => 425, "name" => "Star Wars : Le reveil de la force", "row" => $i, "seat" => $j];
                }   
            }      
            $res = json_encode(["id"=>$result["IDMovie"],"name" => $result["title"],"seatsAvailable"=>49, "seatConfiguration" => $tabSeat]);
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
    $postDecoded = json_decode($post,true);
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