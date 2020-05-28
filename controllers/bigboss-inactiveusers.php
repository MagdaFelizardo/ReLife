<?php
require("./models/bigboss.php");

$bossModel= new Boss();

if(isset($_SESSION["admin"])){

    $inactive_users = $bossModel->getInactiveUsers();
}
else{
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $user_id = file_get_contents("php://input");

    $activateUser = $bossModel->activateUser($user_id);
    
}




require("./views/bigboss-inactiveusers.php");