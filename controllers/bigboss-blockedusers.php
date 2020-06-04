<?php
require("./models/bigboss.php");

$bossModel= new Boss();

if(isset($_SESSION["admin"])){

    $blocked_users = $bossModel->getBlockedUsers();
}
else{
    header("HTTP/1.1 401 Unauthorized");
    die("Unauthorized");
}




require("./views/bigboss-blockedusers.php");