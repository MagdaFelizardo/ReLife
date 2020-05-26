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




require("./views/bigboss-inactiveusers.php");