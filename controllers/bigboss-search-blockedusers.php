<?php
require("./models/bigboss.php");

$bossModel= new Boss();

if(isset($_SESSION["admin"])){

    $blocked_users = $bossModel->searchBlockedUsers($_GET["search"]);
}
else{
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
}




require("./views/bigboss-search-blockedusers.php");