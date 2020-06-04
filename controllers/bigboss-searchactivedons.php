<?php
require("./models/bigboss.php");

$bossModel= new Boss();

//numeraçao 
$page_number = 1;


if(isset($_SESSION["admin"])){

    $activedons = $bossModel->searchActiveDons($_GET['search']);
}
else{
    header("HTTP/1.1 401 Unauthorized");
    die("Unauthorized");
}


if($_SERVER["REQUEST_METHOD"] === "DELETE"){

    $id = file_get_contents("php://input");

    $deleted = $bossModel->deleteDonation($id);

    die(json_encode(
        ["message" => "OK"]
    ));

}elseif($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = file_get_contents("php://input");

    $disapproved = $bossModel->disapproveDon($id);
}



require("./views/bigboss-searchactivedons.php");







