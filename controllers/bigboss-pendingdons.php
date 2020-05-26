<?php
require("./models/bigboss.php");

$bossModel= new Boss();

if(isset($_SESSION["admin"])){

    $pendingdons = $bossModel->getPendingList();
}
else{
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
}


require("./views/bigboss-pendingdons.php");