<?php
require("./models/bigboss.php");

$bossModel= new Boss();

if(isset($_SESSION["admin"])){

    $inactive_users = $bossModel->searchInactiveUsers($_GET["search"]);
}
else{
    header("HTTP/1.1 401 Unauthorized");
    die("Unauthorized");
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $user_id = file_get_contents("php://input");

    $activateUser = $bossModel->activateUser($user_id);
    
}




require("./views/bigboss-search-inactive-users.php");