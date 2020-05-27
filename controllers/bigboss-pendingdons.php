<?php
require("./models/bigboss.php");

$bossModel= new Boss();

$btnid = 1;

if(isset($_SESSION["admin"])){

    $pendingdons = $bossModel->getPendingList();
}
else{
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
}


if($_SERVER["REQUEST_METHOD"] === "DELETE"){

    $id = file_get_contents("php://input");

    $deleted = $bossModel->deleteDonation($id);

    die(json_encode(
        ["message" => "OK"]
    ));

}elseif($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = file_get_contents("php://input");

    $approved = $bossModel->approveDon($id);
}


require("./views/bigboss-pendingdons.php");