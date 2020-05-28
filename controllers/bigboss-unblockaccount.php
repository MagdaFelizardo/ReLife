<?php
require("./models/bigboss.php");

$bossModel= new Boss();

$results = $bossModel->unblockUser($url_parts[2]); 

if($results > 0 ){
    header("Location: /bigboss-activeusers/");
    exit();
}

header("Location: /bigboss-activeusers/");