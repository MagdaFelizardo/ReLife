<?php
require("./models/bigboss.php");

$bossModel= new Boss();

if(isset($_SESSION["admin"])){

    $active_users = $bossModel->getActiveUsers();
}
else{
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $user_id = file_get_contents("php://input");

    $deactivateUser = $bossModel->deactivateUser($user_id);
    
}


require("./views/bigboss-activeusers.php");