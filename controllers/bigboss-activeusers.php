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




require("./views/bigboss-activeusers.php");