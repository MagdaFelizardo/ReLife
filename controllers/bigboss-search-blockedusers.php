<?php
require("./models/bigboss.php");

$bossModel= new Boss();

if(isset($_SESSION["admin"])){

    $blocked_users = $bossModel->searchBlockedUsers($_GET["search"]);
}
else{
    header("HTTP/1.1 401 Unauthorized");
    die("Unauthorized");
}




require("./views/bigboss-search-blockedusers.php");