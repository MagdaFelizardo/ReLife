<?php
require("./models/bigboss.php");

$bossModel= new Boss();

$results = $bossModel->blockUser($url_parts[2]); 

if($results > 0 && ($_GET["source"]) === "pending"){
    header("Location: /bigboss-inactiveusers/");
    exit();

}elseif($results > 0 && ($_GET["source"]) === "active"){
    header("Location: /bigboss-activeusers/");
    exit();
}

header("Location: /bigboss-activeusers/");